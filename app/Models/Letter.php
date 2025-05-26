<?php

namespace SayIt\Models;

use SayIt\Core\Database;
use PDO;


class Letter
{
    /*
    id
    letter
    gesture_image
    description
    created_at
    updated_at
    */

    public static function getAll()
    {
        $pdo = Database::connect();
        $stmt = $pdo->query("SELECT * FROM letters ORDER BY letter");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(("SELECT * FROM letters WHERE id = ?"));
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public static function getByLetter($letter)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(("SELECT * FROM letters WHERE letter = ?"));
        $stmt->execute([$letter]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public static function add(string $letter, ?string $gesture_image = null, ?string $description = null)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            INSERT INTO letters (letter, gesture_image, description)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$letter, $gesture_image, $description]);
    }

    public static function updateById(int $id, string $letter, ?string $gesture_image = null, ?string $description = null)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            UPDATE letters 
            SET letter = ?, gesture_image = ?, description = ?
            WHERE id = ?
        ");
        return $stmt->execute([$letter, $gesture_image, $description, $id]);
    }

    public static function deleteById(int $id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM letters WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
