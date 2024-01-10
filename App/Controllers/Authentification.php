<?php

namespace App\Controllers;

class Authentification extends Controller
{
    public static function loginHTML()
    {
        self::render('login');
    }

    public static function login()
    {
        self::setHeaderJson();
        $data = json_encode(file_get_contents("php://input"), true);
        echo json_encode($data);
    }

    public static function registerHTML()
    {
        self::render('register');
    }

    public static function register()
    {
        self::setHeaderJson();
        $data = json_decode(file_get_contents("php://input"), true);
        extract($data);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $obj = new \App\Repository\UserRepository();
        $result = $obj->add([NULL, $username, $email, $password, "Author"]);
        echo json_encode(["msg" => $result]);
    }
}
