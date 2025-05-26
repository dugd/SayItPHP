<?php

namespace SayIt\Controllers\Site;

use SayIt\Core\View;

class HomeController
{
    public static function index()
    {
        $title = 'Home';
        View::render('home');
    }
}
