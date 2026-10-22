<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Csrf;
use App\Core\Validator;
use App\Models\ContactMessage;

/**
 * Class ContactService
 * Handles validation, sanitization, and persistence of inbound inquiries.
 */
class ContactService
{
    private string $storagePath;

    public function __construct(?string $storagePath = null)
    {
        $this->storagePath = $storagePath ?? __DIR__ . '/../../storage/messages';
    }

    /**
     * Process contact submission.
     *
     * @param array<string, mixed> $input
     * @return array{success: bool, message: string, errors: array<string, array<string>>|null, data: ContactMessage|null}
     */
    public function process(array $input, string $clientIp = ''): array
    {
        // 1. Validate CSRF token
        $csrfToken = (string)($input['_csrf'] ?? '');
        if (!Csrf::validate($csrfToken)) {
            return [
                'success' => false,
                'message' => 'El token de seguridad ha caducado. Por favor, recarga la página.',
                'errors' => ['_csrf' => ['Token de seguridad no válido.']],
                'data' => null,
            ];
        }

        // 2. Validate input fields with Valitron via Validator wrapper
        $validator = new Validator($input);
        $validator
            ->rule('required', ['nombre', 'email', 'servicio', 'mensaje'])
            ->rule('email', 'email')
            ->rule('lengthMin', 'nombre', 2)
            ->rule('lengthMax', 'nombre', 100)
            ->rule('lengthMin', 'mensaje', 10)
            ->rule('lengthMax', 'mensaje', 2500)
            ->rule('in', 'servicio', [
                'fotografia',
                'video-reels',
                'marcas',
                'paquete-integral',
                'otro'
            ])
            ->labels([
                'nombre' => 'Nombre completo',
                'email' => 'Correo electrónico',
                'telefono' => 'Teléfono',
                'servicio' => 'Tipo de servicio',
                'mensaje' => 'Mensaje o idea'
            ]);

        if (!$validator->validate()) {
            return [
                'success' => false,
                'message' => 'Por favor corrige los campos señalados.',
                'errors' => $validator->errors(),
                'data' => null,
            ];
        }

        // 3. Create sanitized message entity
        $message = new ContactMessage(
            name: trim((string)($input['nombre'] ?? '')),
            email: strtolower(trim((string)($input['email'] ?? ''))),
            phone: trim((string)($input['telefono'] ?? '')),
            service: trim((string)($input['servicio'] ?? '')),
            message: trim((string)($input['mensaje'] ?? '')),
            ipAddress: $clientIp
        );

        // 4. Save to storage
        $this->saveMessage($message);

        return [
            'success' => true,
            'message' => '¡Gracias por escribirnos! Iván Molina revisará tu mensaje muy pronto.',
            'errors' => null,
            'data' => $message,
        ];
    }

    /**
     * Persist message record to JSON Lines storage.
     */
    private function saveMessage(ContactMessage $message): void
    {
        if (!is_dir($this->storagePath)) {
            @mkdir($this->storagePath, 0775, true);
        }

        $logFile = $this->storagePath . '/messages.jsonl';
        $entry = json_encode($message->toArray(), JSON_UNESCAPED_UNICODE) . PHP_EOL;
        @file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
    }
}
