<?php

namespace SayIt\Controllers\Site;

class HomeController
{
    public static function index()
    {
        $title = 'Home';
        $view = __DIR__ . '/../../Views/Site/Home.php';

        require __DIR__ . '/../../Views/Site/layout.php';
    }
}
