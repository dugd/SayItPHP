<?php

// -------------------------------
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// -------------------------------
require_once __DIR__ . '/../vendor/autoload.php';

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
require_once $envPath . '/helpers/config.php';

// -------------------------------
session_start();

// -------------------------------
require_once $envPath . '/app/Core/Router.php';

$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);
