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
        $data = json_decode(file_get_contents("php://input"), true);
        extract($data);

        $msg = '';

        $obj = new \App\Repository\UserRepository();
        $items = $obj->fetchOne([["email", $email]]);

        if ($items) {
            if (password_verify($password, $items[0]->password)) {
                $_SESSION["user_id"] = $items[0]->id;
                $_SESSION["user_role"] = $items[0]->role;

                $msg = "ok";
            } else {
                $msg = "Password Incorrect";
            }
        } else {
            $msg = "User Not Found";
        }
        echo json_encode(["msg" => $msg]);
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

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("location:/");
    }
}
