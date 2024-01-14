<?php

namespace App\Controllers\Author;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public static function index()
    {
        self::render("author/dashboard");
    }
}
