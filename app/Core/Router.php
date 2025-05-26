<?php

use SayIt\Controllers\Site;
use SayIt\Controllers\Admin;


class Router
{
    public function dispatch($uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === '/') {
            Site\HomeController::index();
        } elseif ($path === '/alphabet') {
            Site\AlphabetController::index();
        } elseif ($path === "/admin/alphabet") {
            Admin\AlphabetController::index();
        } elseif ($path === "/admin/alphabet/add") {
            Admin\AlphabetController::add();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
