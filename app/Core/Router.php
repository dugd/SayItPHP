<?php

use SayIt\Controllers\Site\HomeController;
use SayIt\Controllers\Site\AlphabetController;


class Router
{
    public function dispatch($uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === '/') {
            HomeController::index();
        } elseif ($path === '/users') {
            try {
                $pdo = Database::connect();
                $stmt = $pdo->query("SELECT * FROM users");
                while ($row = $stmt->fetch()) {
                    echo $row['id'] . " - " . $row['username'] . "<br>";
                }
            } catch (Exception $e) {
                echo "Database connection error: " . $e->getMessage();
                return;
            }
        } elseif ($path === '/alphabet') {
            AlphabetController::index();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
