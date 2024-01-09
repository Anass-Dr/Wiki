<?php

namespace App\Controllers;

class Authentification extends Controller
{
    private static function setHeaderJson()
    {
        header("Content-Type:application/json");
    }

    public static function loginHTML()
    {
        self::render('login');
    }

    public static function login()
    {
        self::setHeaderJson();
        $data = json_encode(file_get_contents("php://input"), true);
        echo json_encode(["msg" => "Working"]);
    }

    public static function registerHTML()
    {
        self::render('register');
    }
}
