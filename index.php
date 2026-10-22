<?php
declare(strict_types=1);

/**
 * Ivan Media — One-Page Portfolio
 * Front Controller (MVC Architecture)
 */

require_once __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
use App\Controllers\HomeController;

// Initialize session if needed
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$router = new Router();

// Route: Main landing page
$router->get('/', static function (): void {
    (new HomeController())->index();
});

// Route: Redirect /contacto to the contact anchor
$router->get('/contacto', static function (): void {
    header('Location: /#contact', true, 301);
    exit;
});

// Fallback 404 handler
$router->set404(static function (): void {
    http_response_code(404);
    header('Location: /', true, 302);
    exit;
});

// Execute routing
$router->run();
