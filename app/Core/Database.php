<?php


class Database
{
    public static function connect(): PDO
    {
        $config = require __DIR__ . '/../../config/database.php';
        return new PDO($config['dsn'], $config['user'], $config['password']);
    }
}
