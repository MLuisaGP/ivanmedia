<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Class Response
 * Standardizes HTTP responses.
 */
final class Response
{
    /**
     * Send a JSON response with status code and exit.
     */
    public static function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    /**
     * Redirect to a specific URL and exit.
     */
    public static function redirect(string $url, int $statusCode = 302): void
    {
        http_response_code($statusCode);
        header('Location: ' . $url);
        exit;
    }
}
