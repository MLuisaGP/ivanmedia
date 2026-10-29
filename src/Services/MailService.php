<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Env;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Class MailService
 * Handles SMTP email notifications with attachments using PHPMailer.
 */
class MailService
{
    private string $logPath;

    public function __construct()
    {
        $logDir = dirname(__DIR__, 2) . '/storage/logs';
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0775, true);
        }
        $this->logPath = $logDir . '/mail.log';
    }

    /**
     * Send quote submission notification email with attached PDF.
     *
     * @param array<string, mixed> $data
     * @param string $pdfFilePath Absolute path to the generated PDF.
     * @param string $pdfFileName Attachment file name.
     * @return array{success: bool, message: string, error: string|null}
     */
    public function sendQuoteNotification(array $data, string $pdfFilePath, string $pdfFileName): array
    {
        $host = (string)Env::get('EMAIL_HOST', 'smtp.titan.email');
        $port = (int)Env::get('EMAIL_PORT', 465);
        $user = (string)Env::get('EMAIL_USER', 'noreply@gaserviciodistribuciones.com.mx');
        $pwd = (string)Env::get('EMAIL_PWD', 'dPo@ At2#4SF@5');
        $fromAddress = (string)Env::get('EMAIL_FROM_ADDRESS', 'noreply@ivanmedia.com.mx');
        $fromName = (string)Env::get('EMAIL_FROM_NAME', 'Ivan Media');

        // Test recipient (luisagalazmp@gmail.com)
        $recipientEmail = (string)Env::get('QUOTE_RECIPIENT_EMAIL', 'luisagalazmp@gmail.com');
        $recipientName = (string)Env::get('QUOTE_RECIPIENT_NAME', 'Ivan Media Cotizaciones');

        $folio = (string)($data['folio'] ?? 'COT-' . date('Ymd-His'));
        $marca = (string)($data['marca'] ?? 'Marca');
        $nombre = (string)($data['nombre'] ?? 'Cliente');
        $email = (string)($data['email'] ?? '');
        $telefono = (string)($data['telefono'] ?? '');
        $presupuesto = (string)($data['presupuesto'] ?? 'No especificado');
        $giro = (string)($data['giro'] ?? 'No especificado');

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $user;
            $mail->Password   = $pwd;
            $mail->Port       = $port;
            $mail->CharSet    = 'UTF-8';
            $mail->Timeout    = 10;

            // SSL en puerto 465
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            // Sobre y remitente autenticado con nombre Ivan Media
            $mail->Sender = $user;
            $mail->setFrom($user, $fromName);

            // Responder a Ivan Media y al cliente solicitante
            if ($fromAddress !== '' && $fromAddress !== $user) {
                $mail->addReplyTo($fromAddress, $fromName);
            }
            if (!empty($email)) {
                $mail->addReplyTo($email, $nombre);
            }

            $mail->addAddress($recipientEmail, $recipientName);

            // Attach PDF
            if (is_file($pdfFilePath) && is_readable($pdfFilePath)) {
                $mail->addAttachment($pdfFilePath, $pdfFileName, 'base64', 'application/pdf');
            }

            $mail->isHTML(true);
            $mail->Subject = "Nueva Cotización [{$folio}] — {$marca} ({$nombre})";
            $mail->Body    = $this->buildEmailHtml($data, $folio, $pdfFileName);
            $mail->AltBody = $this->buildEmailText($data, $folio);

            $mail->send();

            $this->log("[SUCCESS] Correo enviado a {$recipientEmail} para folio {$folio}");

            return [
                'success' => true,
                'message' => 'Correo y PDF enviados correctamente.',
                'error' => null,
            ];
        } catch (Exception $e) {
            $errorMessage = $mail->ErrorInfo ?: $e->getMessage();
            $this->log("[ERROR] Fallo al enviar correo para folio {$folio}: {$errorMessage}");

            return [
                'success' => false,
                'message' => 'No se pudo enviar el correo por SMTP en este momento.',
                'error' => $errorMessage,
            ];
        }
    }

    /**
     * Build HTML body for the notification email.
     *
     * @param array<string, mixed> $data
     */
    private function buildEmailHtml(array $data, string $folio, string $pdfFileName): string
    {
        $nombre = htmlspecialchars((string)($data['nombre'] ?? ''), ENT_QUOTES, 'UTF-8');
        $marca = htmlspecialchars((string)($data['marca'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars((string)($data['email'] ?? ''), ENT_QUOTES, 'UTF-8');
        $telefono = htmlspecialchars((string)($data['telefono'] ?? ''), ENT_QUOTES, 'UTF-8');
        $giro = htmlspecialchars((string)($data['giro'] ?? ''), ENT_QUOTES, 'UTF-8');
        $presupuesto = htmlspecialchars((string)($data['presupuesto'] ?? ''), ENT_QUOTES, 'UTF-8');
        $tiempo = htmlspecialchars((string)($data['tiempo_mercado'] ?? ''), ENT_QUOTES, 'UTF-8');
        $canales = htmlspecialchars((string)($data['canales_digitales'] ?? ''), ENT_QUOTES, 'UTF-8');
        $fecha = date('d/m/Y H:i:s');

        return <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
  body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f1f5f9; margin: 0; padding: 25px; color: #1e293b; }
  .email-card { max-width: 620px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); }
  .email-header { background: #021B39; color: #ffffff; padding: 25px 30px; }
  .email-header h1 { margin: 0; font-size: 20px; font-weight: 700; }
  .email-header p { margin: 4px 0 0; font-size: 13px; color: #90A9C8; }
  .email-body { padding: 30px; font-size: 14px; line-height: 1.6; }
  .lead-badge { display: inline-block; background: #D7EAFF; color: #021B39; font-weight: bold; padding: 4px 10px; border-radius: 99px; font-size: 12px; margin-bottom: 15px; }
  .table-data { width: 100%; border-collapse: collapse; margin: 15px 0 20px; }
  .table-data td { padding: 10px 12px; border-bottom: 1px solid #e2e8f0; font-size: 13px; vertical-align: top; }
  .table-data td.label { width: 35%; color: #64748b; font-weight: bold; background: #f8fafc; }
  .table-data td.val { color: #0f172a; }
  .attachment-notice { background: #F4F8FD; border: 1px solid #D7EAFF; border-radius: 8px; padding: 15px; margin-top: 20px; text-align: center; }
  .attachment-notice strong { color: #021B39; display: block; font-size: 14px; margin-bottom: 4px; }
  .attachment-notice span { font-size: 12px; color: #475569; }
  .email-footer { background: #fafafa; border-top: 1px solid #e2e8f0; padding: 18px 30px; text-align: center; font-size: 11px; color: #94a3b8; }
</style>
</head>
<body>
  <div class="email-card">
    <div class="email-header">
      <h1>Ivan Media · Nueva Cotización</h1>
      <p>Folio: {$folio} · Fecha: {$fecha}</p>
    </div>
    <div class="email-body">
      <span class="lead-badge">Solicitud Web Recibida</span>
      <p>Has recibido una nueva solicitud de cotización audiovisual desde el portal web. A continuación el resumen ejecutivo:</p>

      <table class="table-data">
        <tr>
          <td class="label">Solicitante:</td>
          <td class="val"><strong>{$nombre}</strong></td>
        </tr>
        <tr>
          <td class="label">Marca / Negocio:</td>
          <td class="val"><strong>{$marca}</strong></td>
        </tr>
        <tr>
          <td class="label">Correo Electrónico:</td>
          <td class="val"><a href="mailto:{$email}">{$email}</a></td>
        </tr>
        <tr>
          <td class="label">Teléfono / WhatsApp:</td>
          <td class="val"><a href="https://wa.me/{$telefono}">{$telefono}</a></td>
        </tr>
        <tr>
          <td class="label">Giro / Actividad:</td>
          <td class="val">{$giro}</td>
        </tr>
        <tr>
          <td class="label">Presupuesto Mensual:</td>
          <td class="val"><strong>{$presupuesto}</strong></td>
        </tr>
        <tr>
          <td class="label">Tiempo en Mercado:</td>
          <td class="val">{$tiempo}</td>
        </tr>
        <tr>
          <td class="label">Canales Digitales:</td>
          <td class="val">{$canales}</td>
        </tr>
      </table>

      <div class="attachment-notice">
        <strong>PDF Adjunto Incluido: {$pdfFileName}</strong>
        <span>El documento adjunto contiene el brief completo con todas las preguntas del formulario (audiencia, competencia, objetivos de marketing y expectativas).</span>
      </div>
    </div>
    <div class="email-footer">
      Ivan Media · Fotografía comercial & Producción audiovisual · Hermosillo, Sonora<br>
      Notificación automatizada del sistema web.
    </div>
  </div>
</body>
</html>
HTML;
    }

    /**
     * Build plain text body for non-HTML mail readers.
     *
     * @param array<string, mixed> $data
     */
    private function buildEmailText(array $data, string $folio): string
    {
        $nombre = (string)($data['nombre'] ?? '');
        $marca = (string)($data['marca'] ?? '');
        $email = (string)($data['email'] ?? '');
        $telefono = (string)($data['telefono'] ?? '');
        $presupuesto = (string)($data['presupuesto'] ?? '');

        return "NUEVA SOLICITUD DE COTIZACIÓN - IVAN MEDIA\n"
            . "Folio: {$folio}\n"
            . "----------------------------------------\n"
            . "Solicitante: {$nombre}\n"
            . "Marca / Negocio: {$marca}\n"
            . "Correo: {$email}\n"
            . "Teléfono / WhatsApp: {$telefono}\n"
            . "Presupuesto Estimado: {$presupuesto}\n"
            . "----------------------------------------\n"
            . "Se adjunta el documento PDF con todos los detalles del brief.";
    }

    /**
     * Append message to log file.
     */
    private function log(string $message): void
    {
        $entry = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
        @file_put_contents($this->logPath, $entry, FILE_APPEND);
    }
}
