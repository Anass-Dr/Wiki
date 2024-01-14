<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public static function index()
    {
        self::render('wiki/index');
    }

    public static function search()
    {
        self::setHeaderJson();
        extract($_GET);

        $obj;
        $results = [];

        if ($type == "wiki") {
            $obj = new \App\Repository\WikiRepository();

            if ($column == "name") {
                $results = $obj->searchWiki(["type" => "pattern", "table" => "wikis", "data" => ["title", "%$key%"]]);
            } else {
                $results = $obj->searchWiki(["type" => "equal", "table" => $column, "data" => [$column . "_id", $id]]);
            }
        } else {
            if ($type == "tag") $obj = new \App\Repository\TagRepository();
            else if ($type == "category") $obj = new \App\Repository\CategoryRepository();

            $results = $obj->search([$type == "wiki" ? "title" : "name", "%$key%"]);
        }

        echo json_encode($results);
    }
}
