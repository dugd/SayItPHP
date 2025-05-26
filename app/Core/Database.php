<?php

namespace SayIt\Core;

use PDO;

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function connect(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(config('db.dsn'), config('db.user'), config('db.password'));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

$dto = Database::connect();
