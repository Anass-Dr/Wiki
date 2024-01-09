<?php

namespace App\Core;

class Database
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $this->db = new \PDO("mysql:host={$_ENV['HOST']};user={$_ENV['USER']};password={$_ENV['PASSWORD']};dbname={$_ENV['DB_NAME']}");
    }

    public static function getInstance()
    {
        if (!self::$instance) self::$instance = new self();

        return self::$instance;
    }
    public function connect()
    {
        return $this->db;
    }
    private function __clone()
    {
    }
}
