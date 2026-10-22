<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Class Csrf
 * Handles Cross-Site Request Forgery token generation and verification.
 */
final class Csrf
{
    private const SESSION_KEY = '_csrf_token';

    /**
     * Get or generate the current CSRF token.
     */
    public static function token(): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = bin2hex(random_bytes(32));
        }

        return $_SESSION[self::SESSION_KEY];
    }

    /**
     * Render a hidden HTML input containing the CSRF token.
     */
    public static function field(): string
    {
        return '<input type="hidden" name="_csrf" value="' . htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8') . '">';
    }

    /**
     * Validate the provided token against the session token.
     */
    public static function validate(?string $token): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $sessionToken = $_SESSION[self::SESSION_KEY] ?? '';
        if ($sessionToken === '' || empty($token)) {
            return false;
        }

        return hash_equals($sessionToken, $token);
    }
}
