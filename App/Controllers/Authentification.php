<?php

namespace App\Controllers;

class Authentification extends Controller
{
    public static function loginHTML()
    {
        self::render('authentication/login');
    }

    public static function login()
    {
        self::setHeaderJson();
        $data = json_decode(file_get_contents("php://input"), true);
        extract($data);

        # Check CSRF Token :
        if (\App\Middlewares\Authorization::csrf_verifiy($csrf_token)) {
            $msg = '';
            $obj = new \App\Repository\UserRepository();
            $item = $obj->fetchOne([["email", $email]]);

            if ($item) {
                if (password_verify($password, $item->password)) {
                    $_SESSION["user_id"] = $item->id;
                    $_SESSION["user_role"] = $item->role;
                    $msg = "ok";
                } else {
                    $msg = "Password Incorrect";
                }
            } else {
                $msg = "User Not Found";
            }
        } else $msg = "You don't have Permission!";

        echo json_encode(["msg" => $msg, "previous" => $_SESSION["previous"] ?? '']);
    }

    public static function registerHTML()
    {
        self::render('authentication/register');
    }

    public static function register()
    {
        self::setHeaderJson();
        $data = json_decode(file_get_contents("php://input"), true);
        extract($data);
        $msg = "";
        $password = password_hash($password, PASSWORD_DEFAULT);

        # Check CSRF Token :
        if (\App\Middlewares\Authorization::csrf_verifiy($csrf_token)) {
            $obj = new \App\Repository\UserRepository();
            $msg = $obj->add([NULL, $username, $email, $password, "Author"]);
        } else $msg = "You don't have Permission!";

        echo json_encode(["msg" => $msg]);
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("location:/");
    }
}
