<?php

namespace App\Controllers;

class WikiController extends Controller
{
    public static function index()
    {
        self::render("wiki");
    }
    public static function getAll()
    {
        self::setHeaderJson();
        $repository = new \App\Repository\WikiRepository();
        $wikis = $repository->getWikisJoined();
        echo json_encode($wikis);
    }
    public static function getLatest()
    {
        self::setHeaderJson();
        $repository = new \App\Repository\WikiRepository();
        $wikis = $repository->fetchLatest();
        echo json_encode($wikis);
    }
}
