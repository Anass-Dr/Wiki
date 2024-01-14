<?php

namespace App\Controllers;

class WikiController extends Controller
{
    public static function index()
    {
        $obj = new \App\Repository\WikiRepository();
        $wiki = $obj->fetchOneJoined($_GET["id"]);
        self::render("wiki/wiki", ["wiki" => $wiki]);
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
        $wikis = $repository->fetchNewest();
        echo json_encode($wikis);
    }
}
