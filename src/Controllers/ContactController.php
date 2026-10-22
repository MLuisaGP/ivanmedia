<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Response;
use App\Services\ContactService;

/**
 * Class ContactController
 * Handles inbound inquiry submissions.
 */
class ContactController
{
    public function __construct(
        private readonly ContactService $contactService = new ContactService()
    ) {}

    /**
     * Handle contact form POST request.
     */
    public function submit(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $input = $_POST;
        $ip = (string)($_SERVER['REMOTE_ADDR'] ?? '');
        $result = $this->contactService->process($input, $ip);

        $isAjax = $this->isAjaxRequest();

        if ($isAjax) {
            $status = $result['success'] ? 200 : 422;
            Response::json($result, $status);
        }

        // Traditional form submission redirect with session flash
        $_SESSION['flash'] = [
            'success' => $result['success'],
            'message' => $result['message'],
            'errors' => $result['errors'],
            'old' => $result['success'] ? [] : [
                'nombre' => $input['nombre'] ?? '',
                'email' => $input['email'] ?? '',
                'telefono' => $input['telefono'] ?? '',
                'servicio' => $input['servicio'] ?? '',
                'mensaje' => $input['mensaje'] ?? '',
            ],
        ];

        Response::redirect('/#contact');
    }

    /**
     * Detect if the current request is an asynchronous XMLHttpRequest or fetch request.
     */
    private function isAjaxRequest(): bool
    {
        $requestedWith = strtolower((string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''));
        $accept = strtolower((string)($_SERVER['HTTP_ACCEPT'] ?? ''));

        return $requestedWith === 'xmlhttprequest' || str_contains($accept, 'application/json');
    }
}
