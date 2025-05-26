<?php

namespace SayIt\Core;

class Uploader
{
    protected static $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    protected static $uploadDir = BASE_PATH . '/uploads';

    public static function upload($file, $prefix = 'img_')
    {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return ['error' => 'Файл не передано або не є завантаженим.'];
        }

        if (!in_array($file['type'], self::$allowedTypes)) {
            return ['error' => 'Непідтримуваний тип файлу.'];
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = $prefix . uniqid() . '.' . $ext;
        $targetPath = self::$uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            return ['error' => 'Не вдалося зберегти файл.'];
        }

        $relativePath = '/uploads/' . $filename;
        return ['path' => $relativePath, 'name' => $filename];
    }
}
