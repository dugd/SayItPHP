<?php

namespace SayIt\Controllers\Site;

use SayIt\Core\View;
use SayIt\Core\Auth;

class LoginController
{
    public static function show()
    {
        $title = 'Вхід';
        View::render('login', ['title' => $title], 'layout', 'site');
    }

    public static function login()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (Auth::attempt($username, $password)) {
                header('Location: /');
                exit;
            } else {
                $error = 'Невірний username або пароль.';
            }
        }

        $title = 'Вхід';
        View::render('login', ['title' => $title, 'error' => $error], 'layout', 'site');
    }

    public static function logout()
    {
        \SayIt\Core\Auth::logout();
        header('Location: /login');
        exit;
    }
}
