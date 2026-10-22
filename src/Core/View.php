<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

/**
 * Class View
 * Minimalist, secure view template renderer with layout and partial support.
 */
final class View
{
    private static string $viewsPath = __DIR__ . '/../Views/';

    /**
     * Render a view within an optional layout.
     *
     * @param string $view Relative view name (e.g. 'pages/home')
     * @param array<string, mixed> $data Variables passed to the view
     * @param string|null $layout Relative layout name (e.g. 'layouts/main')
     */
    public static function render(string $view, array $data = [], ?string $layout = 'layouts/main'): string
    {
        $content = self::renderFile(self::resolvePath($view), $data);

        if ($layout !== null) {
            $layoutData = array_merge($data, ['content' => $content]);
            return self::renderFile(self::resolvePath($layout), $layoutData);
        }

        return $content;
    }

    /**
     * Render a partial view template.
     *
     * @param string $partial Relative partial name (e.g. 'partials/header')
     * @param array<string, mixed> $data Variables passed to the partial
     */
    public static function partial(string $partial, array $data = []): string
    {
        return self::renderFile(self::resolvePath($partial), $data);
    }

    /**
     * Resolve a view name to absolute filesystem path.
     */
    private static function resolvePath(string $view): string
    {
        $path = self::$viewsPath . ltrim($view, '/') . '.php';
        if (!file_exists($path)) {
            throw new RuntimeException("Vista no encontrada: {$path}");
        }
        return $path;
    }

    /**
     * Evaluate and capture a PHP template file within an isolated scope.
     *
     * @param string $filePath
     * @param array<string, mixed> $data
     */
    private static function renderFile(string $filePath, array $data): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        try {
            include $filePath;
            return ob_get_clean() ?: '';
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
    }
}
