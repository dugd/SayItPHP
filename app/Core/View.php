<?php

namespace SayIt\Core;

class View
{
    public static function render($view, $data = [], $layout = 'layout', $namespace = 'site')
    {
        $basePath = __DIR__ . '/../views/' . $namespace;

        $viewPath = $basePath . '/' . $view . '.php';
        $layoutPath = $basePath . '/' . $layout . '.php';

        if (!file_exists($viewPath)) {
            die("View file not found: $viewPath");
        }

        extract($data);

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        include $layoutPath;
    }
}
