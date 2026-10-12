<?php

require __DIR__ . '/../src/bootstrap.php';

use App\Core\Router;
use App\Controllers\PortfolioController;
use App\Controllers\ContactController;
use App\Controllers\Api\ProfileController;

$router = new Router();
$router->get('/', [PortfolioController::class, 'index']);
$router->post('/contact', [ContactController::class, 'store']);
$router->get('/api/profile', [ProfileController::class, 'index']);

try {
    $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (Throwable $e) {
    error_log((string) $e);
    http_response_code(500);
    require __DIR__ . '/../src/Views/errors/500.php';
}
