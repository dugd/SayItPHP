<?php

namespace SayIt\Controllers\Site;

use SayIt\Core\View;

class AlphabetController
{
    public static function index()
    {
        $title = 'Alphabet';
        View::render('alphabet');
    }
}
