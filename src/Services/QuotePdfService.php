<?php
declare(strict_types=1);

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Class QuotePdfService
 * Generates branded, executive-quality PDF quotation briefs from customer inquiries.
 */
class QuotePdfService
{
    private string $storageDir;

    public function __construct(?string $storageDir = null)
    {
        $this->storageDir = $storageDir ?? dirname(__DIR__, 2) . '/storage/quotes';
        if (!is_dir($this->storageDir)) {
            @mkdir($this->storageDir, 0775, true);
        }
    }

    /**
     * Generate PDF document from quote data and save to storage.
     *
     * @param array<string, mixed> $data
     * @return array{filePath: string, fileName: string, content: string}
     */
    public function generate(array $data): array
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);

        $html = $this->renderHtml($data);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        $folio = (string)($data['folio'] ?? 'COT-' . date('Ymd-His'));
        $safeBrand = preg_replace('/[^a-zA-Z0-9_\-]/', '_', (string)($data['marca'] ?? 'Cliente'));
        $fileName = "Cotizacion_{$safeBrand}_{$folio}.pdf";
        $filePath = $this->storageDir . '/' . $fileName;

        file_put_contents($filePath, $pdfContent);

        return [
            'filePath' => $filePath,
            'fileName' => $fileName,
            'content' => $pdfContent,
        ];
    }

    /**
     * Build the HTML layout for the PDF document.
     *
     * @param array<string, mixed> $data
     */
    private function renderHtml(array $data): string
    {
        $folio = htmlspecialchars((string)($data['folio'] ?? 'COT-' . date('Ymd-His')), ENT_QUOTES, 'UTF-8');
        $fecha = htmlspecialchars((string)($data['created_at'] ?? date('d/m/Y H:i:s')), ENT_QUOTES, 'UTF-8');

        // Contact info
        $nombre = htmlspecialchars((string)($data['nombre'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');
        $marca = htmlspecialchars((string)($data['marca'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars((string)($data['email'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');
        $telefono = htmlspecialchars((string)($data['telefono'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');

        // Business info
        $giro = nl2br(htmlspecialchars((string)($data['giro'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8'));
        $ubicacion = htmlspecialchars((string)($data['ubicacion'] ?? 'No especificada'), ENT_QUOTES, 'UTF-8');
        $tiempoMercado = htmlspecialchars((string)($data['tiempo_mercado'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');
        $canalesDigitales = htmlspecialchars((string)($data['canales_digitales'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');

        // Objectives
        $objetivosRaw = $data['objetivos_3_6m'] ?? [];
        if (!is_array($objetivosRaw)) {
            $objetivosRaw = array_filter([(string)$objetivosRaw]);
        }
        $objetivoOtro = trim((string)($data['objetivo_otro_detalle'] ?? ''));
        $objetivosList = [];
        foreach ($objetivosRaw as $obj) {
            $objStr = (string)$obj;
            if ($objStr === 'Otro' && $objetivoOtro !== '') {
                $objetivosList[] = 'Otro: ' . htmlspecialchars($objetivoOtro, ENT_QUOTES, 'UTF-8');
            } else {
                $objetivosList[] = htmlspecialchars($objStr, ENT_QUOTES, 'UTF-8');
            }
        }
        $objetivosHtml = !empty($objetivosList) ? implode(' · ', $objetivosList) : 'Ninguno seleccionado';

        $resultadoRaw = $data['resultado_ideal'] ?? [];
        if (!is_array($resultadoRaw)) {
            $resultadoRaw = array_filter([(string)$resultadoRaw]);
        }
        $resultadoList = array_map(static fn($r) => htmlspecialchars((string)$r, ENT_QUOTES, 'UTF-8'), $resultadoRaw);
        $resultadoHtml = !empty($resultadoList) ? implode(' · ', $resultadoList) : 'No especificado';

        // Audience & competitors
        $clienteIdeal = nl2br(htmlspecialchars((string)($data['cliente_ideal'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8'));
        $competidores = nl2br(htmlspecialchars((string)($data['competidores'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8'));

        // Investment & expectations
        $presupuesto = htmlspecialchars((string)($data['presupuesto'] ?? 'No especificado'), ENT_QUOTES, 'UTF-8');
        $expectativas = nl2br(htmlspecialchars((string)($data['expectativas'] ?? 'Sin expectativas adicionales especificadas'), ENT_QUOTES, 'UTF-8'));

        // Logo image base64
        $logoBase64 = $this->getLogoBase64();

        return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Solicitud de Cotización — {$marca}</title>
<style>
  @page {
    margin: 28px 32px 35px 32px;
  }
  body {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    color: #1e293b;
    font-size: 11px;
    line-height: 1.5;
    background-color: #ffffff;
    margin: 0;
    padding: 0 0 35px 0;
  }
  .header-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 18px;
    border-bottom: 2px solid #021B39;
    padding-bottom: 12px;
    page-break-inside: avoid;
  }
  .header-logo {
    width: 165px;
    height: auto;
    max-height: 44px;
    display: block;
  }
  .header-meta {
    text-align: right;
    font-size: 10px;
    color: #64748b;
  }
  .header-meta strong {
    font-size: 13px;
    color: #021B39;
    display: block;
    margin-bottom: 2px;
  }
  .badge-folio {
    display: inline-block;
    background: #021B39;
    color: #ffffff;
    padding: 3px 8px;
    border-radius: 4px;
    font-weight: bold;
    font-size: 11px;
    margin-top: 3px;
  }
  .title-banner {
    background: #F4F8FD;
    border-left: 4px solid #021B39;
    padding: 8px 12px;
    margin-bottom: 14px;
    page-break-inside: avoid;
  }
  .title-banner h1 {
    margin: 0;
    font-size: 14px;
    color: #021B39;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .title-banner p {
    margin: 2px 0 0;
    font-size: 10px;
    color: #475569;
  }
  .section-card {
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    margin-bottom: 12px;
    background: #ffffff;
    page-break-inside: avoid;
  }
  .section-card-header {
    background: #021B39;
    color: #ffffff;
    padding: 6px 12px;
    font-size: 10.5px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .section-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
  }
  .section-table tr {
    page-break-inside: avoid;
  }
  .section-table td {
    padding: 6px 10px;
    vertical-align: top;
    font-size: 10.5px;
    border-bottom: 1px solid #f1f5f9;
    word-wrap: break-word;
    word-break: break-word;
  }
  .section-table tr:last-child td {
    border-bottom: none;
  }
  .field-label {
    width: 32%;
    color: #475569;
    font-weight: bold;
    background: #fafafa;
  }
  .field-value {
    width: 68%;
    color: #0f172a;
  }
  .highlight-badge {
    display: inline-block;
    background: #D7EAFF;
    color: #021B39;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 10px;
  }
  .footer-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    border-top: 1px solid #e2e8f0;
    padding-top: 6px;
    font-size: 9px;
    color: #94a3b8;
  }
  .footer-bar strong {
    color: #021B39;
  }
</style>
</head>
<body>

  <!-- Encabezado con logotipo y folio -->
  <table class="header-table">
    <tr>
      <td style="vertical-align: middle;">
        {$logoBase64}
      </td>
      <td class="header-meta" style="vertical-align: middle;">
        <strong>SOLICITUD DE COTIZACIÓN AUDIOVISUAL</strong>
        <span>Fecha de registro: {$fecha}</span><br>
        <span class="badge-folio">FOLIO: {$folio}</span>
      </td>
    </tr>
  </table>

  <!-- Título principal -->
  <div class="title-banner">
    <h1>Expediente de Brief Comercial — {$marca}</h1>
    <p>Información detallada recopilada para diseño de propuesta audiovisual personalizada.</p>
  </div>

  <!-- Paso 1: Información de Contacto -->
  <div class="section-card">
    <div class="section-card-header">1. Información de Contacto</div>
    <table class="section-table">
      <tr>
        <td class="field-label">Nombre del Solicitante:</td>
        <td class="field-value"><strong>{$nombre}</strong></td>
      </tr>
      <tr>
        <td class="field-label">Negocio o Marca:</td>
        <td class="field-value"><span class="highlight-badge">{$marca}</span></td>
      </tr>
      <tr>
        <td class="field-label">Correo Electrónico:</td>
        <td class="field-value">{$email}</td>
      </tr>
      <tr>
        <td class="field-label">Teléfono / WhatsApp:</td>
        <td class="field-value">{$telefono}</td>
      </tr>
    </table>
  </div>

  <!-- Paso 2: Todo sobre tu Negocio -->
  <div class="section-card">
    <div class="section-card-header">2. Perfil del Negocio</div>
    <table class="section-table">
      <tr>
        <td class="field-label">Giro / ¿A qué se dedica?:</td>
        <td class="field-value">{$giro}</td>
      </tr>
      <tr>
        <td class="field-label">Ubicación / Zona de Atención:</td>
        <td class="field-value">{$ubicacion}</td>
      </tr>
      <tr>
        <td class="field-label">Tiempo en el Mercado:</td>
        <td class="field-value">{$tiempoMercado}</td>
      </tr>
      <tr>
        <td class="field-label">Canales Digitales Actuales:</td>
        <td class="field-value">{$canalesDigitales}</td>
      </tr>
    </table>
  </div>

  <!-- Paso 3: Objetivos Comerciales -->
  <div class="section-card">
    <div class="section-card-header">3. Objetivos Comerciales y de Marketing</div>
    <table class="section-table">
      <tr>
        <td class="field-label">Metas para los próximos 3–6 meses:</td>
        <td class="field-value">{$objetivosHtml}</td>
      </tr>
      <tr>
        <td class="field-label">Resultado Ideal en Marketing:</td>
        <td class="field-value"><strong>{$resultadoHtml}</strong></td>
      </tr>
    </table>
  </div>

  <!-- Paso 4: Clientes y Competencia -->
  <div class="section-card">
    <div class="section-card-header">4. Audiencia y Referencias Competitivas</div>
    <table class="section-table">
      <tr>
        <td class="field-label">Perfil del Cliente Ideal:</td>
        <td class="field-value">{$clienteIdeal}</td>
      </tr>
      <tr>
        <td class="field-label">Competidores / Marcas de Referencia:</td>
        <td class="field-value">{$competidores}</td>
      </tr>
    </table>
  </div>

  <!-- Paso 5: Inversión y Expectativas -->
  <div class="section-card">
    <div class="section-card-header">5. Inversión y Expectativas de Alianza</div>
    <table class="section-table">
      <tr>
        <td class="field-label">Presupuesto Mensual Estimado:</td>
        <td class="field-value"><span class="highlight-badge">{$presupuesto}</span></td>
      </tr>
      <tr>
        <td class="field-label">Expectativas del Aliado Ideal:</td>
        <td class="field-value">{$expectativas}</td>
      </tr>
    </table>
  </div>

  <!-- Pie de página fijo -->
  <div class="footer-bar">
    <strong>Ivan Media</strong> · Fotografía comercial & Producción audiovisual · Hermosillo, Sonora<br>
    Documento confidencial generado a través de ivanmedia.com.mx
  </div>

</body>
</html>
HTML;
    }

    /**
     * Retrieve Ivan Media's logo as an embedded HTML img tag with base64 data URI.
     */
    private function getLogoBase64(): string
    {
        $possiblePaths = [
            dirname(__DIR__, 2) . '/assets/images/logos/ivan.Media-blue.png',
            dirname(__DIR__, 2) . '/assets/imagenes/logos/ivan.Media-blue.png',
            dirname(__DIR__, 2) . '/assets/logos/ivan.Media-blue.png',
            dirname(__DIR__, 2) . '/assets/images/logos/ivan.Media.png',
            dirname(__DIR__, 2) . '/assets/imagenes/logos/ivan.Media.png',
            dirname(__DIR__, 2) . '/assets/logos/ivan.Media.png',
        ];

        foreach ($possiblePaths as $path) {
            if (is_file($path) && is_readable($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                if ($data !== false) {
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    return '<img src="' . $base64 . '" class="header-logo" alt="Ivan Media">';
                }
            }
        }

        return '<strong style="font-size: 16px; color: #021B39;">IVAN MEDIA</strong>';
    }
}
