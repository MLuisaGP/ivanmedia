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
        // 1. Validation
        $v = new Validator($input);
        $v->rule('required', ['nombre', 'marca', 'email', 'telefono', 'giro', 'tiempo_mercado', 'canales_digitales', 'cliente_ideal', 'competidores', 'presupuesto']);
        $v->rule('email', 'email');
        $v->rule('lengthMin', 'nombre', 2);
        $v->rule('lengthMin', 'marca', 2);
        $v->rule('lengthMin', 'giro', 5);
        $v->rule('lengthMin', 'cliente_ideal', 5);
        $v->rule('lengthMin', 'competidores', 2);

        $v->labels([
            'nombre' => 'Nombre completo',
            'marca' => 'Nombre del negocio o marca',
            'email' => 'Correo electrónico',
            'telefono' => 'Número de teléfono o WhatsApp',
            'giro' => 'Giro del negocio',
            'tiempo_mercado' => 'Tiempo en el mercado',
            'canales_digitales' => 'Página web o redes sociales',
            'cliente_ideal' => 'Cliente ideal',
            'competidores' => 'Competidores o marcas de referencia',
            'presupuesto' => 'Presupuesto mensual estimado',
        ]);

        if (!$v->validate()) {
            return [
                'success' => false,
                'message' => 'Por favor revisa los campos requeridos del formulario.',
                'errors' => $v->errors(),
                'folio' => null,
                'pdfFile' => null,
                'emailSent' => false,
            ];
        }

        // 2. Generate unique folio & metadata
        $folio = 'COT-' . date('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
        $data = $input;
        $data['folio'] = $folio;
        $data['ip'] = $ip;
        $data['created_at'] = date('Y-m-d H:i:s');

        // 3. Save JSON record to local storage (Audit trail)
        $this->saveRecord($data);

        // 4. Generate branded PDF
        $pdfResult = $this->pdfService->generate($data);

        // 5. Send SMTP email with PDF attachment
        $mailResult = $this->mailService->sendQuoteNotification(
            $data,
            $pdfResult['filePath'],
            $pdfResult['fileName']
        );

        return [
            'success' => true,
            'message' => $mailResult['success']
                ? '¡Solicitud de cotización registrada y enviada con éxito!'
                : '¡Solicitud de cotización registrada con éxito (folio ' . $folio . ')!',
            'errors' => null,
            'folio' => $folio,
            'pdfFile' => $pdfResult['fileName'],
            'emailSent' => $mailResult['success'],
            'emailError' => $mailResult['error'] ?? null,
        ];
    }

    /**
     * Persist quote inquiry to quotes.jsonl
     *
     * @param array<string, mixed> $data
     */
    private function saveRecord(array $data): void
    {
        $logFile = $this->storageDir . '/quotes.jsonl';
        $entry = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL;
        @file_put_contents($logFile, $entry, FILE_APPEND);
    }
}
