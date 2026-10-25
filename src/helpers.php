<?php
declare(strict_types=1);

use App\Core\IconHelper;
use App\Core\Csrf;
use App\Core\Env;
use App\Models\SiteConfig;

if (!function_exists('env')) {
    /**
     * Get an environment variable value with an optional default.
     */
    function env(string $key, mixed $default = null): mixed {
        return Env::get($key, $default);
    }
}

if (!function_exists('site')) {
    /**
     * Get site configuration loaded from environment.
     */
    function site(): SiteConfig {
        static $instance = null;
        if ($instance === null) {
            $instance = new SiteConfig();
        }
        return $instance;
    }
}

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
