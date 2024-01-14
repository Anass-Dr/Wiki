<?php

namespace App\Controllers;

class Controller
{
    public static function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . "/../../Views/$view.php";
    }
    protected static function setHeaderJson()
    {
        header("Content-Type:application/json");
    }
}
