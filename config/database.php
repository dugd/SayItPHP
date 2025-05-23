<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

return [
    'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname=$_ENV[DB_NAME];",
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
];
