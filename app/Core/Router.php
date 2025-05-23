<?php

class Router
{
    public function dispatch($uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === '/') {
            // require_once __DIR__ . '/../Controllers/HomeController.php';
            // HomeController::index();
            echo "Welcome to the Home Page!";
        } elseif ($path === '/words') {
            // require_once __DIR__ . '/../Controllers/WordController.php';
            // WordController::index();
            echo "List of Words";
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
