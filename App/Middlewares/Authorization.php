<?php

namespace App\Middlewares;

class Authorization
{
    public static function csrf_generate()
    {
        if (!isset($_SESSION["csrf_token"])) $_SESSION["csrf_token"] = bin2hex(random_bytes(21));
        return $_SESSION["csrf_token"];
    }

    public static function csrf_verifiy($token)
    {
        return $token == $_SESSION["csrf_token"];
    }

    public static function handle($request, $next)
    {
        if (!isset($_SESSION["user_role"]) && (strpos($request, "admin") || strpos($request, "author"))) {
            $_SESSION["previous"] = $request;
            header("location:/login");
        } else if ($_SESSION["user_role"] === "Author" && strpos($request, "admin")) {
            header("location:/author");
        } else {
            $controller = $next[0];
            $action = $next[1];
            $controller::$action();
        }
    }
}
