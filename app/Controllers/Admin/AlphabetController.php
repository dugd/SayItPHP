<?php

namespace SayIt\Controllers\Admin;

use SayIt\Models\Letter;
use SayIt\Core\View;
use SayIt\Core\Uploader;
use SayIt\Core\Auth;

class AlphabetController
{
    public static function index()
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        $letters = Letter::getAll();
        $title = 'Літери';
        View::render('alphabet_index', compact('letters', 'title'), 'layout', 'admin');
    }

    public static function add()
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        $errors = [];
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $letter = trim($_POST['letter'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if ($letter === '') {
                $errors[] = 'Введіть букву.';
            }

            if (empty($errors)) {
                $gestureImage = null;

                if (!empty($_FILES['gesture_image']) && $_FILES['gesture_image']['error'] === UPLOAD_ERR_OK) {
                    $upload = Uploader::upload($_FILES['gesture_image']);

                    if (isset($upload['error'])) {
                        $errors[] = $upload['error'];
                    } else {
                        $gestureImage = $upload['name'];
                    }
                }

                if (empty($errors)) {
                    if (Letter::add($letter, $gestureImage, $description)) {
                        $success = true;
                    } else {
                        $errors[] = 'Помилка при додаванні до бази.';
                    }
                }
            }
        }

        $title = 'Додавання літери';
        View::render('alphabet_form', compact('title', 'success', 'errors'), 'layout', 'admin');
    }

    public static function edit()
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        $id = $_GET['id'] ?? null;
        $errors = [];
        $success = false;

        if (!$id || !($letterData = Letter::getById($id))) {
            header('Location: /admin/alphabet');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $letter = trim($_POST['letter'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $gestureImage = $letterData['gesture_image'];

            if ($letter === '') {
                $errors[] = 'Введіть букву.';
            }

            if (empty($errors)) {
                if (!empty($_FILES['gesture_image']) && $_FILES['gesture_image']['error'] === UPLOAD_ERR_OK) {
                    $upload = Uploader::upload($_FILES['gesture_image']);
                    if (isset($upload['error'])) {
                        $errors[] = $upload['error'];
                    } else {
                        $gestureImage = $upload['name'];
                    }
                }

                if (empty($errors)) {
                    if (Letter::updateById($id, $letter, $gestureImage, $description)) {
                        $success = true;
                        $letterData = Letter::GetById($id);
                    } else {
                        $errors[] = 'Помилка при оновленні.';
                    }
                }
            }
        }

        $title = 'Редагування літери';
        View::render('alphabet_form', compact('title', 'success', 'errors', 'letterData'), 'layout', 'admin');
    }

    public static function delete()
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            Letter::deleteById((int)$_POST['id']);
        }
        header('Location: /admin/alphabet');
        exit;
    }
}
