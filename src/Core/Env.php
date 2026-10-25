<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Class Env
 * Lightweight, zero-dependency environment configuration loader and manager.
 */
class Env
{
    private static bool $loaded = false;
    private static string $loadedPath = '';

    /**
     * Load environment variables from a file (defaults to project root .env).
     *
     * @param string|null $path Path to .env file.
     * @param bool $override Whether to overwrite already defined environment variables.
     * @return bool True if file was loaded, false otherwise.
     */
    public static function load(?string $path = null, bool $override = true): bool
    {
        $filePath = $path ?? dirname(__DIR__, 2) . '/.env';

        if (!is_file($filePath) || !is_readable($filePath)) {
            return false;
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return false;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip empty lines or comment lines
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            // Must contain '='
            $separatorPos = strpos($line, '=');
            if ($separatorPos === false) {
                continue;
            }

            $key = trim(substr($line, 0, $separatorPos));
            $rawValue = trim(substr($line, $separatorPos + 1));

            if ($key === '') {
                continue;
            }

            // Strip unquoted inline comments
            $cleanValue = self::stripComment($rawValue);

            // Parse typed value (quotes, booleans, null)
            $parsedValue = self::parseValue($cleanValue);

            if ($override || (!array_key_exists($key, $_ENV) && !array_key_exists($key, $_SERVER))) {
                $_ENV[$key] = $parsedValue;
                $_SERVER[$key] = $parsedValue;
                if (is_scalar($parsedValue)) {
                    putenv("{$key}={$parsedValue}");
                }
            }
        }

        self::$loaded = true;
        self::$loadedPath = $filePath;
        return true;
    }

    /**
     * Retrieve an environment variable value with fallback and case-insensitivity support.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (!self::$loaded) {
            self::load();
        }

        // 1. Direct match in $_ENV
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        // 2. Direct match in $_SERVER
        if (array_key_exists($key, $_SERVER)) {
            return $_SERVER[$key];
        }

        // 3. Direct match via getenv
        $val = getenv($key);
        if ($val !== false) {
            return $val;
        }

        // 4. Uppercase alias fallback (e.g. 'whatsapp' -> 'WHATSAPP')
        $upperKey = strtoupper($key);
        if ($upperKey !== $key) {
            if (array_key_exists($upperKey, $_ENV)) {
                return $_ENV[$upperKey];
            }
            if (array_key_exists($upperKey, $_SERVER)) {
                return $_SERVER[$upperKey];
            }
            $upperVal = getenv($upperKey);
            if ($upperVal !== false) {
                return $upperVal;
            }
        }

        // 5. Case-insensitive search across $_ENV
        foreach ($_ENV as $k => $v) {
            if (strcasecmp($k, $key) === 0) {
                return $v;
            }
        }

        return $default;
    }

    /**
     * Check if a specific environment variable is defined.
     */
    public static function has(string $key): bool
    {
        return self::get($key) !== null;
    }

    /**
     * Return all loaded environment keys as an associative array.
     *
     * @return array<string, mixed>
     */
    public static function all(): array
    {
        if (!self::$loaded) {
            self::load();
        }
        return $_ENV;
    }

    /**
     * Strip inline comments while respecting quoted strings.
     */
    private static function stripComment(string $value): string
    {
        $len = strlen($value);
        if ($len === 0) {
            return $value;
        }

        $quote = null;
        $clean = '';

        for ($i = 0; $i < $len; $i++) {
            $char = $value[$i];

            if ($quote !== null) {
                $clean .= $char;
                if ($char === $quote && ($i === 0 || $value[$i - 1] !== '\\')) {
                    $quote = null;
                }
            } else {
                if ($char === '"' || $char === "'") {
                    $quote = $char;
                    $clean .= $char;
                } elseif ($char === '#') {
                    // Inline comment begins
                    break;
                } else {
                    $clean .= $char;
                }
            }
        }

        return trim($clean);
    }

    /**
     * Parse special string values (booleans, null, quotes).
     */
    private static function parseValue(string $value): mixed
    {
        $len = strlen($value);
        if ($len >= 2) {
            $first = $value[0];
            $last = $value[$len - 1];
            if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                $unquoted = substr($value, 1, -1);
                return $first === '"' ? stripcslashes($unquoted) : $unquoted;
            }
        }

        return match (strtolower($value)) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'null', '(null)' => null,
            'empty', '(empty)' => '',
            default => $value,
        };
    }
}
