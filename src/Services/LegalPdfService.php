<?php
declare(strict_types=1);

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\SiteConfig;

/**
 * Class LegalPdfService
 * Generates downloadable, executive-grade PDF documents for Privacy Policy and Terms & Conditions.
 */
class LegalPdfService
{
    private SiteConfig $site;

    public function __construct(?SiteConfig $site = null)
    {
        $this->site = $site ?? new SiteConfig();
    }

    /**
     * Generate and stream Privacy Policy PDF.
     */
    public function downloadPrivacyPdf(): void
    {
        $html = $this->renderPrivacyHtml();
        $this->streamPdf($html, 'Ivan_Media_Aviso_de_Privacidad.pdf');
    }

    /**
     * Generate and stream Terms & Conditions PDF.
     */
    public function downloadTermsPdf(): void
    {
        $html = $this->renderTermsHtml();
        $this->streamPdf($html, 'Ivan_Media_Terminos_y_Condiciones.pdf');
    }

    /**
     * Configure Dompdf, render HTML and stream to browser.
     */
    private function streamPdf(string $html, string $fileName): void
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Canvas for page numbering "Página X de Y"
        $canvas = $dompdf->getCanvas();
        if ($canvas) {
            $canvas->page_text(
                270,
                815,
                "Página {PAGE_NUM} de {PAGE_COUNT}",
                'Helvetica',
                8,
                [0.45, 0.52, 0.6]
            );
        }

        // Stream output with attachment headers
        $dompdf->stream($fileName, [
            'Attachment' => true,
        ]);
        exit(0);
    }

    /**
     * Logo as Base64 HTML img tag.
     */
    private function getLogoBase64(): string
    {
        $possiblePaths = [
            dirname(__DIR__, 2) . '/assets/images/logos/ivan.Media-blue.png',
            dirname(__DIR__, 2) . '/assets/images/logos/ivan.Media.png',
        ];

        foreach ($possiblePaths as $path) {
            if (is_file($path) && is_readable($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                if ($data !== false) {
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    return '<img src="' . $base64 . '" style="max-height: 38px; width: auto;" alt="Ivan Media">';
                }
            }
        }

        return '<strong style="font-size: 16px; color: #021B39; font-family: Helvetica, sans-serif;">IVAN MEDIA</strong>';
    }

    /**
     * Render HTML for Privacy Policy.
     */
    private function renderPrivacyHtml(): string
    {
        $logo = $this->getLogoBase64();
        $date = '30 de octubre de 2026';
        $location = htmlspecialchars($this->site->location, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->site->email, ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($this->site->phoneFormatted, ENT_QUOTES, 'UTF-8');

        return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Aviso de Privacidad Integral — Ivan Media</title>
  <style>
    @page {
      margin: 22mm 18mm 22mm 18mm;
    }
    body {
      font-family: 'Helvetica', 'Arial', sans-serif;
      font-size: 9.5pt;
      line-height: 1.55;
      color: #272422;
      margin: 0;
      padding: 0;
    }
    .header-table {
      width: 100%;
      border-bottom: 2.5pt solid #021B39;
      padding-bottom: 12px;
      margin-bottom: 20px;
    }
    .header-table td {
      vertical-align: middle;
    }
    .doc-meta {
      text-align: right;
      font-size: 8pt;
      color: #64748b;
      line-height: 1.35;
    }
    .doc-meta strong {
      color: #021B39;
    }
    .main-title {
      font-size: 18pt;
      font-weight: bold;
      color: #021B39;
      margin: 0 0 4px 0;
      text-transform: uppercase;
      letter-spacing: -0.5px;
    }
    .subtitle {
      font-size: 10pt;
      color: #475569;
      margin: 0 0 16px 0;
      font-weight: normal;
    }
    .badge-box {
      background-color: #EDF5FD;
      border: 1px solid #D7EAFF;
      border-left: 3.5pt solid #021B39;
      padding: 8px 12px;
      margin-bottom: 18px;
      font-size: 8.5pt;
      color: #021B39;
    }
    h2 {
      font-size: 11pt;
      color: #021B39;
      border-bottom: 1pt solid #E2E8F0;
      padding-bottom: 3px;
      margin-top: 16px;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    h3 {
      font-size: 9.5pt;
      color: #0F172A;
      margin-top: 10px;
      margin-bottom: 4px;
    }
    p {
      margin: 0 0 8px 0;
      text-align: justify;
    }
    ul, ol {
      margin: 0 0 10px 0;
      padding-left: 18px;
    }
    li {
      margin-bottom: 3px;
    }
    .table-data {
      width: 100%;
      border-collapse: collapse;
      margin: 10px 0;
      font-size: 8.5pt;
    }
    .table-data th, .table-data td {
      border: 1pt solid #E2E8F0;
      padding: 6px 8px;
      text-align: left;
    }
    .table-data th {
      background-color: #F1F5F9;
      color: #021B39;
      font-weight: bold;
    }
    .contact-card {
      background-color: #021B39;
      color: #FFFFFF;
      padding: 12px 16px;
      border-radius: 4px;
      margin-top: 20px;
      font-size: 8.5pt;
    }
    .contact-card table {
      width: 100%;
    }
    .contact-card td {
      padding: 3px 0;
      color: #D7EAFF;
    }
    .contact-card strong {
      color: #FFFFFF;
    }
    .footer-fixed {
      position: fixed;
      bottom: -15mm;
      left: 0;
      right: 0;
      border-top: 0.5pt solid #CBD5E1;
      padding-top: 4px;
      font-size: 7.5pt;
      color: #64748b;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="footer-fixed">
    Ivan Media · Fotografía Comercial & Producción Audiovisual · {$location} · {$email} · {$phone}
  </div>

  <table class="header-table">
    <tr>
      <td>{$logo}</td>
      <td class="doc-meta">
        <strong>AVISO DE PRIVACIDAD INTEGRAL</strong><br>
        Marco Legal: LFPDPPP / INAI<br>
        Última actualización: {$date}<br>
        Sede: {$location}
      </td>
    </tr>
  </table>

  <div class="main-title">Aviso de Privacidad Integral</div>
  <div class="subtitle">Protección de Datos Personales en Posesión de Particulares — Ivan Media</div>

  <div class="badge-box">
    <strong>Documento Oficial:</strong> El presente documento rige las condiciones de tratamiento, almacenamiento y protección de datos personales recabados a través del sitio web, cotizaciones interactivas y servicios de Ivan Media.
  </div>

  <h2>1. Identidad y Domicilio del Responsable</h2>
  <p>
    <strong>Ivan Media</strong>, bajo la titularidad de <strong>Iván Molina</strong>, con domicilio en la ciudad de <strong>Hermosillo, Sonora, México</strong>, en cumplimiento con la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP)</strong>, su Reglamento y los Lineamientos del Aviso de Privacidad emitidos por el INAI, es el responsable del tratamiento y resguardo de sus datos personales.
  </p>

  <h2>2. Datos Personales Recabados</h2>
  <p>Ivan Media recaba los siguientes datos conforme al servicio solicitado:</p>
  <ul>
    <li><strong>Identificación y contacto:</strong> Nombre completo, correo electrónico, teléfono/WhatsApp, nombre de la marca o empresa y ubicación del negocio.</li>
    <li><strong>Información de proyecto:</strong> Sector o nicho comercial, requerimientos audiovisuales, cliente meta, objetivos de comunicación y presupuesto estimado.</li>
    <li><strong>Material audiovisual:</strong> Imágenes fotográficas, grabaciones de video y audio capturadas durante sesiones comerciales contratadas.</li>
    <li><strong>Datos de navegación:</strong> Métricas de sesión, dirección IP y cookies técnicas de funcionalidad.</li>
  </ul>
  <p><em>Nota: Ivan Media NO recaba ni trata datos personales sensibles (salud, origen racial, religión, política, preferencia sexual).</em></p>

  <h2>3. Finalidades del Tratamiento</h2>
  <p><strong>A. Finalidades Primarias (necesarias para el servicio):</strong></p>
  <ul>
    <li>Atención de consultas, solicitudes de presupuesto y emisión de propuestas personalizadas en PDF.</li>
    <li>Planeación y logística de rodajes, sesiones de foto comercial y dirección creativa en locación.</li>
    <li>Filmación, edición, corrección de color, diseño sonoro y entrega de entregables en alta definición.</li>
    <li>Facturación fiscal (CFDI) conforme al SAT y cobranza de honorarios.</li>
  </ul>
  <p><strong>B. Finalidades Secundarias:</strong></p>
  <ul>
    <li>Exhibición de fragmentos de proyectos en portafolio profesional, sitio web y redes sociales oficiales (@_ivan.media).</li>
    <li>Envío de comunicaciones de cortesía y promociones de temporada.</li>
  </ul>
  <p>El titular puede manifestar su negativa para finalidades secundarias enviando un correo a <strong>{$email}</strong>.</p>

  <h2>4. Transferencia de Datos</h2>
  <p>
    Ivan Media no vende ni transfiere sus datos a terceros. Únicamente se realizan transferencias en los supuestos del Artículo 37 de la LFPDPPP a proveedores de infraestructura indispensables (hosting, correo SMTP transaccional y plataformas seguras de almacenamiento como Google Drive / Dropbox) bajo estricta confidencialidad.
  </p>

  <h2>5. Ejercicio de Derechos ARCO</h2>
  <p>Usted tiene derecho de <strong>Acceso, Rectificación, Cancelación y Oposición (ARCO)</strong>:</p>
  <table class="table-data">
    <tr>
      <th style="width: 25%;">Derecho</th>
      <th>Descripción y Alcance</th>
    </tr>
    <tr>
      <td><strong>Acceso</strong></td>
      <td>Conocer qué datos personales suyos conservamos y el tratamiento aplicado.</td>
    </tr>
    <tr>
      <td><strong>Rectificación</strong></td>
      <td>Solicitar corrección de datos inexactos, erróneos o desactualizados.</td>
    </tr>
    <tr>
      <td><strong>Cancelación</strong></td>
      <td>Eliminar registros de nuestras bases de datos si no existe deber contractual o fiscal pendiente.</td>
    </tr>
    <tr>
      <td><strong>Oposición</strong></td>
      <td>Oponerse al tratamiento de datos para finalidades específicas o secundarias.</td>
    </tr>
  </table>
  <p>
    <strong>Procedimiento:</strong> Enviar solicitud por escrito a <strong>{$email}</strong> con su nombre completo, copia de identificación oficial (INE o Pasaporte) y descripción clara de su solicitud. Plazo máximo de respuesta: 20 días hábiles.
  </p>

  <h2>6. Cookies y Tecnologías de Rastreo</h2>
  <p>
    El sitio web emplea cookies técnicas esenciales para el funcionamiento del cotizador y preferencias del usuario. Pueden deshabilitarse desde los ajustes de su navegador (Chrome, Edge, Safari, Firefox).
  </p>

  <h2>7. Medidas de Seguridad</h2>
  <p>
    Implementamos protocolos de cifrado HTTPS/SSL, credenciales de acceso restringido y acuerdos internos de confidencialidad para proteger sus datos personales contra acceso, pérdida o uso no autorizado.
  </p>

  <h2>8. Modificaciones al Aviso de Privacidad</h2>
  <p>
    Cualquier actualización será publicada permanentemente en: <strong>https://ivanmedia.com.mx/aviso-de-privacidad</strong>.
  </p>

  <div class="contact-card">
    <strong style="font-size: 10pt; color: #FFFFFF;">CANALES OFICIALES DE ATENCIÓN A PRIVACIDAD</strong>
    <table style="margin-top: 6px;">
      <tr>
        <td style="width: 50%;"><strong>Responsable:</strong> Iván Molina / Ivan Media</td>
        <td style="width: 50%;"><strong>Correo:</strong> {$email}</td>
      </tr>
      <tr>
        <td><strong>Teléfono / WhatsApp:</strong> {$phone}</td>
        <td><strong>Ubicación:</strong> {$location}</td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }

    /**
     * Render HTML for Terms & Conditions.
     */
    private function renderTermsHtml(): string
    {
        $logo = $this->getLogoBase64();
        $date = '30 de octubre de 2026';
        $location = htmlspecialchars($this->site->location, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->site->email, ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($this->site->phoneFormatted, ENT_QUOTES, 'UTF-8');

        return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Términos y Condiciones de Uso y Contratación — Ivan Media</title>
  <style>
    @page {
      margin: 22mm 18mm 22mm 18mm;
    }
    body {
      font-family: 'Helvetica', 'Arial', sans-serif;
      font-size: 9.5pt;
      line-height: 1.55;
      color: #272422;
      margin: 0;
      padding: 0;
    }
    .header-table {
      width: 100%;
      border-bottom: 2.5pt solid #021B39;
      padding-bottom: 12px;
      margin-bottom: 20px;
    }
    .header-table td {
      vertical-align: middle;
    }
    .doc-meta {
      text-align: right;
      font-size: 8pt;
      color: #64748b;
      line-height: 1.35;
    }
    .doc-meta strong {
      color: #021B39;
    }
    .main-title {
      font-size: 18pt;
      font-weight: bold;
      color: #021B39;
      margin: 0 0 4px 0;
      text-transform: uppercase;
      letter-spacing: -0.5px;
    }
    .subtitle {
      font-size: 10pt;
      color: #475569;
      margin: 0 0 16px 0;
      font-weight: normal;
    }
    .badge-box {
      background-color: #EDF5FD;
      border: 1px solid #D7EAFF;
      border-left: 3.5pt solid #021B39;
      padding: 8px 12px;
      margin-bottom: 18px;
      font-size: 8.5pt;
      color: #021B39;
    }
    h2 {
      font-size: 11pt;
      color: #021B39;
      border-bottom: 1pt solid #E2E8F0;
      padding-bottom: 3px;
      margin-top: 16px;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    p {
      margin: 0 0 8px 0;
      text-align: justify;
    }
    ul, ol {
      margin: 0 0 10px 0;
      padding-left: 18px;
    }
    li {
      margin-bottom: 3px;
    }
    .table-data {
      width: 100%;
      border-collapse: collapse;
      margin: 10px 0;
      font-size: 8.5pt;
    }
    .table-data th, .table-data td {
      border: 1pt solid #E2E8F0;
      padding: 6px 8px;
      text-align: left;
    }
    .table-data th {
      background-color: #F1F5F9;
      color: #021B39;
      font-weight: bold;
    }
    .contact-card {
      background-color: #021B39;
      color: #FFFFFF;
      padding: 12px 16px;
      border-radius: 4px;
      margin-top: 20px;
      font-size: 8.5pt;
    }
    .contact-card table {
      width: 100%;
    }
    .contact-card td {
      padding: 3px 0;
      color: #D7EAFF;
    }
    .contact-card strong {
      color: #FFFFFF;
    }
    .footer-fixed {
      position: fixed;
      bottom: -15mm;
      left: 0;
      right: 0;
      border-top: 0.5pt solid #CBD5E1;
      padding-top: 4px;
      font-size: 7.5pt;
      color: #64748b;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="footer-fixed">
    Ivan Media · Fotografía Comercial & Producción Audiovisual · {$location} · {$email} · {$phone}
  </div>

  <table class="header-table">
    <tr>
      <td>{$logo}</td>
      <td class="doc-meta">
        <strong>TÉRMINOS Y CONDICIONES</strong><br>
        Contratación de Producción Audiovisual<br>
        Última actualización: {$date}<br>
        Jurisdicción: {$location}
      </td>
    </tr>
  </table>

  <div class="main-title">Términos y Condiciones</div>
  <div class="subtitle">Bases Contractuales y Operativas — Ivan Media</div>

  <div class="badge-box">
    <strong>Aceptación Legal:</strong> El uso del sitio web, cotizaciones y contratación de servicios de Ivan Media implica la aceptación obligatoria de los presentes términos bajo la legislación de los Estados Unidos Mexicanos.
  </div>

  <h2>1. Alcance y Objeto</h2>
  <p>
    El presente instrumento regula las condiciones contractuales y de uso aplicables a la cotización, reserva y prestación de servicios de producción de video comercial, fotografía publicitaria, reels para redes sociales y paquetes mensuales de contenido brindados por <strong>Iván Molina / Ivan Media</strong>, con sede en <strong>Hermosillo, Sonora, México</strong>.
  </p>

  <h2>2. Cotizaciones y Propuestas Comerciales</h2>
  <ul>
    <li><strong>Estimados Web:</strong> Los cálculos arrojados por el cotizador interactivo tienen carácter informativo preliminar y no configuran un contrato definitivo hasta su confirmación por escrito.</li>
    <li><strong>Vigencia:</strong> Las cotizaciones formales tienen una vigencia de 15 días naturales a partir de su emisión.</li>
    <li><strong>Gastos Extraordinarios:</strong> Alquiler de locaciones especiales, modelos externos o viáticos fuera de Hermosillo se cotizarán por separado previa autorización.</li>
  </ul>

  <h2>3. Política de Reservas, Pagos y Facturación</h2>
  <table class="table-data">
    <tr>
      <th style="width: 30%;">Concepto</th>
      <th>Condición</th>
    </tr>
    <tr>
      <td><strong>Anticipo de Reserva</strong></td>
      <td>50% del valor cotizado para bloquear y asegurar la fecha de producción en agenda.</td>
    </tr>
    <tr>
      <td><strong>Liquidación de Saldo</strong></td>
      <td>50% restante a la conclusión del llamado o previo a la entrega de archivos en alta definición.</td>
    </tr>
    <tr>
      <td><strong>Moneda e Impuestos</strong></td>
      <td>Precios en MXN (+ IVA en caso de requerir factura electrónica CFDI con validez fiscal SAT).</td>
    </tr>
  </table>

  <h2>4. Propiedad Intelectual y Derechos de Autor (LFDA)</h2>
  <p>
    De conformidad con la <strong>Ley Federal del Derecho de Autor (LFDA)</strong>:
  </p>
  <ul>
    <li><strong>Derechos Morales:</strong> Pertenecen de forma perpetua, inalienable e irrenunciable al autor (Iván Molina / Ivan Media).</li>
    <li><strong>Licencia de Explotación al Cliente:</strong> Tras la liquidación del 100% convenido, el Cliente obtiene una licencia de uso comercial no exclusiva para exhibir y promocionar el material en sus canales digitales propios (web, redes, pantallas).</li>
    <li><strong>Archivos en Bruto (RAW):</strong> Los servicios estándar comprenden la entrega exclusiva de archivos terminados renderizados (.MP4, .JPG). El material sin procesar (RAW) y proyectos editables (Premiere, DaVinci) son propiedad interna del Estudio y no están incluidos.</li>
    <li><strong>Portafolio del Estudio:</strong> Ivan Media se reserva el derecho de exhibir fragmentos en su portafolio y redes sociales (@_ivan.media).</li>
  </ul>

  <h2>5. Obligaciones del Cliente</h2>
  <ul>
    <li>Proveer oportunamente activos de marca (logos vectoriales, manual de identidad y productos).</li>
    <li>Garantizar accesos y permisos en locaciones privadas acordadas.</li>
    <li>Contar con consentimiento de imagen de sus colaboradores o modelos que aparezcan en escena.</li>
    <li>Puntualidad en llamados: retrasos superiores a 30 minutos podrán descontarse del tiempo de producción.</li>
  </ul>

  <h2>6. Revisiones y Entrega Final</h2>
  <ul>
    <li>Cada proyecto contempla hasta <strong>2 rondas de ajustes menores</strong> sobre la versión preliminar.</li>
    <li>El Cliente tiene <strong>5 días hábiles</strong> para emitir sus comentarios consolidados; transcurrido el plazo se entenderá por aprobado.</li>
    <li>Resguardo garantizado de archivos finales durante 60 días naturales posteriores a la entrega.</li>
  </ul>

  <h2>7. Cancelación y Reprogramación</h2>
  <ul>
    <li><strong>Aviso con más de 72 horas:</strong> Reprogramación sin penalización económica (sujeto a disponibilidad).</li>
    <li><strong>Aviso con menos de 48 horas:</strong> El anticipo no será reembolsable por bloqueo exclusivo de agenda.</li>
    <li><strong>Fuerza Mayor o Clima:</strong> Reprogramación sin costo ante lluvias intensas en exteriores o emergencias acreditadas.</li>
  </ul>

  <h2>8. Limitación de Responsabilidad</h2>
  <p>
    Ivan Media garantiza la calidad técnica y artística del trabajo, pero no garantiza ni asume responsabilidad por metas específicas de venta comercial, retorno monetario directo o algoritmos de viralidad en redes sociales.
  </p>

  <h2>9. Legislación y Jurisdicción</h2>
  <p>
    Para la resolución de controversias, las partes se someten a las leyes federales de los Estados Unidos Mexicanos y a los <strong>Tribunales Civiles de la ciudad de Hermosillo, Sonora</strong>, renunciando a cualquier otro fuero.
  </p>

  <div class="contact-card">
    <strong style="font-size: 10pt; color: #FFFFFF;">ATENCIÓN Y CONTACTO LEGAL</strong>
    <table style="margin-top: 6px;">
      <tr>
        <td style="width: 50%;"><strong>Estudio:</strong> Iván Molina / Ivan Media</td>
        <td style="width: 50%;"><strong>Correo:</strong> {$email}</td>
      </tr>
      <tr>
        <td><strong>Teléfono / WhatsApp:</strong> {$phone}</td>
        <td><strong>Sede:</strong> {$location}</td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }
}
