<?php
declare(strict_types=1);

namespace App\Services;

use Valitron\Validator;

/**
 * Class QuoteService
 * Processes quote requests: validation, PDF generation, storage, and SMTP email dispatch.
 */
class QuoteService
{
    private string $storageDir;
    private QuotePdfService $pdfService;
    private MailService $mailService;

    public function __construct(
        ?string $storageDir = null,
        ?QuotePdfService $pdfService = null,
        ?MailService $mailService = null
    ) {
        $this->storageDir = $storageDir ?? dirname(__DIR__, 2) . '/storage/quotes';
        if (!is_dir($this->storageDir)) {
            @mkdir($this->storageDir, 0775, true);
        }

        $this->pdfService = $pdfService ?? new QuotePdfService($this->storageDir);
        $this->mailService = $mailService ?? new MailService();
    }

    /**
     * Process quote request from submission data.
     *
     * @param array<string, mixed> $input
     * @param string $ip
     * @return array{
     *   success: bool,
     *   message: string,
     *   errors: array<string, array<string>>|null,
     *   folio: string|null,
     *   pdfFile: string|null,
     *   emailSent: bool,
     *   emailError: string|null
     * }
     */
    public function process(array $input, string $ip = ''): array
    {
        // 1. Consentimiento Clickwrap obligatorio
        $consentVal = strtolower(trim((string)($input['consentimiento'] ?? '')));
        $hasConsent = in_array($consentVal, ['aceptado', '1', 'true', 'on', 'yes'], true);
        if (!$hasConsent) {
            return [
                'success' => false,
                'message' => 'Debes marcar la casilla para aceptar los Términos y Condiciones y el Aviso de Privacidad antes de enviar.',
                'errors' => ['consentimiento' => ['Por favor marca la casilla de aceptación legal']],
                'folio' => null,
                'pdfFile' => null,
                'emailSent' => false,
                'emailError' => null,
            ];
        }

        // 2. Validación de datos con etiquetas claras en español
        $v = new Validator($input);
        $v->rule('required', ['nombre', 'marca', 'email', 'telefono', 'giro', 'tiempo_mercado', 'canales_digitales', 'cliente_ideal', 'competidores', 'presupuesto']);
        $v->rule('email', 'email');
        $v->rule('lengthMin', 'nombre', 2);
        $v->rule('lengthMin', 'marca', 2);
        $v->rule('lengthMin', 'giro', 2);
        $v->rule('lengthMin', 'cliente_ideal', 2);
        $v->rule('lengthMin', 'competidores', 1);

        $labels = [
            'nombre' => 'Nombre completo (Paso 1)',
            'marca' => 'Nombre del negocio o marca (Paso 1)',
            'email' => 'Correo electrónico válido (Paso 1)',
            'telefono' => 'Número de teléfono o WhatsApp (Paso 1)',
            'giro' => 'Giro del negocio (Paso 2)',
            'tiempo_mercado' => 'Tiempo en el mercado (Paso 2)',
            'canales_digitales' => 'Página web o redes (Paso 2)',
            'cliente_ideal' => 'Cliente ideal (Paso 4)',
            'competidores' => 'Competidores o referencias (Paso 4)',
            'presupuesto' => 'Presupuesto mensual estimado (Paso 5)',
        ];
        $v->labels($labels);

        if (!$v->validate()) {
            $errFields = [];
            foreach (array_keys($v->errors()) as $field) {
                $errFields[] = $labels[$field] ?? $field;
            }
            return [
                'success' => false,
                'message' => 'Por favor completa o revisa los siguientes campos: ' . implode(', ', $errFields) . '.',
                'errors' => $v->errors(),
                'folio' => null,
                'pdfFile' => null,
                'emailSent' => false,
                'emailError' => null,
            ];
        }

        // 3. Generate unique folio & legal metadata
        $folio = 'COT-' . date('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
        $data = $input;
        $data['folio'] = $folio;
        $data['ip'] = $ip;
        $data['consentimiento_legal'] = [
            'otorgado' => true,
            'declaracion' => 'He leído y acepto los Términos y Condiciones y el Aviso de Privacidad',
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $ip,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Web Client',
        ];
        $data['created_at'] = date('Y-m-d H:i:s');

        // 4. Save JSON record to local storage (Audit trail)
        $this->saveRecord($data);

        // 5. Generate branded PDF
        $pdfResult = $this->pdfService->generate($data);

        // 6. Send SMTP email notification to admin with PDF attached
        $emailResult = $this->mailService->sendQuoteNotification($data, $pdfResult['filePath'], $pdfResult['fileName']);

        return [
            'success' => true,
            'message' => '¡Cotización generada y enviada con éxito!',
            'errors' => null,
            'folio' => $folio,
            'pdfFile' => $pdfResult['fileName'],
            'emailSent' => $emailResult['success'],
            'emailError' => $emailResult['error'],
        ];
    }

    /**
     * Persist quote submission to secure JSON file for local auditing.
     *
     * @param array<string, mixed> $data
     */
    private function saveRecord(array $data): void
    {
        $folio = preg_replace('/[^a-zA-Z0-9_\-]/', '_', (string)($data['folio'] ?? uniqid('quote_', true)));
        $fileName = "quote_{$folio}.json";
        $filePath = $this->storageDir . '/' . $fileName;

        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
