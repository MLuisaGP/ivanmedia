<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Response;
use App\Services\QuoteService;

/**
 * Class QuoteController
 * Receives quotation form submissions, triggers PDF generation and email dispatch.
 */
class QuoteController
{
    private QuoteService $quoteService;

    public function __construct(?QuoteService $quoteService = null)
    {
        $this->quoteService = $quoteService ?? new QuoteService();
    }

    /**
     * Handle incoming quote submission POST request.
     */
    public function submit(): void
    {
        // Support both FormData / $_POST and raw JSON payload
        $input = $_POST;
        if (empty($input)) {
            $rawJson = (string)file_get_contents('php://input');
            $decoded = json_decode($rawJson, true);
            if (is_array($decoded)) {
                $input = $decoded;
            }
        }

        $ip = (string)($_SERVER['REMOTE_ADDR'] ?? '');
        $result = $this->quoteService->process($input, $ip);

        $statusCode = $result['success'] ? 200 : 422;
        Response::json($result, $statusCode);
    }

    /**
     * Download or stream generated quote PDF dossier.
     */
    public function download(string $fileName): void
    {
        $safeName = basename($fileName);
        if (!str_ends_with(strtolower($safeName), '.pdf')) {
            Response::text('Archivo no válido.', 400);
            return;
        }

        $filePath = dirname(__DIR__, 2) . '/storage/quotes/' . $safeName;
        if (!is_file($filePath) || !is_readable($filePath)) {
            Response::text('Expediente no encontrado.', 404);
            return;
        }

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $safeName . '"');
        header('Content-Length: ' . (string)filesize($filePath));
        header('Cache-Control: private, max-age=3600');
        readfile($filePath);
        exit;
    }
}
