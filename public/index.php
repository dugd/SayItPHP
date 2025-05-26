<?php

// -------------------------------
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// -------------------------------
define('BASE_PATH', dirname(__DIR__));

// -------------------------------
require_once BASE_PATH . '/vendor/autoload.php';

// -------------------------------
use Dotenv\Dotenv;

$envPath = dirname(__DIR__);
$dotenvFile = $envPath . '/.env';

if (file_exists($dotenvFile)) {
    try {
        Dotenv::createImmutable($envPath)->load();
    } catch (Exception $e) {
        die('Помилка при завантаженні .env: ' . $e->getMessage());
    }
} else {
    die('Файл .env не знайдено');
}

// -------------------------------
require_once BASE_PATH . '/helpers/config.php';

// -------------------------------
session_start();

// -------------------------------
use SayIt\Core\Router;
use SayIt\Controllers\Admin;
use SayIt\Controllers\Site;

$router = new Router();

$router->get('/', [Site\HomeController::class, 'index']);
$router->get('/alphabet', [Site\AlphabetController::class, 'index']);

$router->get('/admin/alphabet', [Admin\AlphabetController::class, 'index']);
$router->get('/admin/alphabet/add', [Admin\AlphabetController::class, 'add']);
$router->post('/admin/alphabet/add', [Admin\AlphabetController::class, 'add']);

$router->get('/admin/alphabet/edit', [Admin\AlphabetController::class, 'edit']);
$router->post('/admin/alphabet/edit', [Admin\AlphabetController::class, 'edit']);

$router->dispatch($_SERVER['REQUEST_URI']);
