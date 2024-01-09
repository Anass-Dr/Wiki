<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public static function index()
    {
        self::render('index');
    }
}
