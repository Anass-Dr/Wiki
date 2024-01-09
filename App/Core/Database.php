<?php

namespace App\Core;

class Database
{
    private $db;

    public static function connect()
    {
        self::$db = new \PDO("mysql:host={$_ENV['HOST']};user={$_ENV['USER']};password={$_ENV['PASSWORD']};dbname={$_ENV['DB_NAME']}");
        return self::$db;
    }

    public static function close()
    {
        self::$db = NULL;
    }
}
