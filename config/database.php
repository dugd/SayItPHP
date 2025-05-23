<?php

use Dotenv\Dotenv;

$envPath = __DIR__ . '/../';
if (file_exists($envPath . '.env')) {
    try {
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->load();
    } catch (Exception $e) {
        die('Помилка при завантаженні .env: ' . $e->getMessage());
    }
} else {
    die('.env file not found');
}

return [
    'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname=$_ENV[DB_NAME];",
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
];
