<?php

namespace SayIt\Controllers\Site;

use SayIt\Core\View;
use SayIt\Models\Letter;

class AlphabetController
{
    public static function index()
    {
        $letters = Letter::getAll();

        $selected = null;
        $current = $_GET['letter'] ?? null;

        if ($current) {
            $selected = Letter::getByLetter($current);
        }

        $title = 'Абеткa';
        View::render('alphabet_index', compact('letters', 'selected', 'title'), 'layout', 'site');
    }
}
