<?php

namespace SayIt\Controllers\Admin;

use SayIt\Models\Letter;
use SayIt\Core\View;


class AlphabetController
{
    public static function index()
    {
        $letters = Letter::getAll();
        $title = 'Літери';
        View::render('alphabet_index', ['letters' => $letters], 'layout', 'admin');
    }

    public static function add()
    {
        $errors = [];
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $letter = $_POST['letter'] ?? '';
            $description = $_POST['description'] ?? '';
            $gestureImage = null;

            if (empty($letter)) {
                $errors[] = "Введіть букву.";
            }

            if (isset($_FILES['gesture_image']) && $_FILES['gesture_image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['gesture_image']['tmp_name'];
                $fileName = basename($_FILES['gesture_image']['name']);
                $uploadDir = __DIR__ . '/../../../uploads/';
                $uploadPath = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    $gestureImage = $fileName;
                } else {
                    $errors[] = "Не вдалося загрузити файл.";
                }

                if (empty($errors)) {
                    if (Letter::add($letter, $gestureImage, $description)) {
                        $success = true;
                    } else {
                        $errors[] = "Помилка при додаванні в базу.";
                    }
                }
            }
        }

        $title = 'Add letter';
        View::render('alphabet_index', ['success' => $success, 'errors' => $errors], 'layout', 'admin');
    }
}
