<?php
declare(strict_types=1);

use App\Core\IconHelper;
use App\Core\Csrf;

if (!function_exists('e')) {
    /**
     * Escape HTML output securely.
     */
    function e(?string $value): string {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('icon')) {
    /**
     * Render an inline SVG icon by name.
     */
    function icon(string $name, string $extraClass = ''): string {
        return IconHelper::render($name, $extraClass);
    }
}

if (!function_exists('csrf_token')) {
    /**
     * Get the current CSRF token.
     */
    function csrf_token(): string {
        return Csrf::token();
    }
}

if (!function_exists('csrf_field')) {
    /**
     * Render a hidden CSRF token input field.
     */
    function csrf_field(): string {
        return Csrf::field();
    }
}
