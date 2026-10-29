<?php
declare(strict_types=1);

/**
 * Ivan Media — One-Page Portfolio & Niche Showcase
 * Front Controller (MVC Architecture)
 */

require_once __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\NicheController;
use App\Core\Response;
use App\Core\Env;

// Load environment configuration (.env)
Env::load(__DIR__ . '/.env');

// Initialize session if needed
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$router = new Router();

// Route: Main landing page
$router->get('/', static function (): void {
    (new HomeController())->index();
});

// Route: Specialized Niche showcase page
$router->get('/nicho/([a-z0-9\-]+)', static function (string $slug): void {
    (new NicheController())->show($slug);
});

// Route: Redirect /contacto to the contact anchor
$router->get('/contacto', static function (): void {
    Response::redirect('/#contact', 301);
});

// Route: Submit quote inquiry (Generates PDF brief and sends SMTP email)
$router->post('/api/cotizar', static function (): void {
    (new \App\Controllers\QuoteController())->submit();
});
$router->post('/cotizar', static function (): void {
    (new \App\Controllers\QuoteController())->submit();
});

// Route: View or download generated quote PDF dossier
$router->get('/cotizacion/descargar/([a-zA-Z0-9_\-\.]+)', static function (string $file): void {
    (new \App\Controllers\QuoteController())->download($file);
});

// Fallback 404 handler
$router->set404(static function (): void {
    Response::redirect('/', 302);
});

// Execute routing
$router->run();
