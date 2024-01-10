<?php

namespace App\Controllers;

class TagController extends Controller
{
    public static function getAll()
    {
        self::setHeaderJson();
        $repository = new \App\Repository\TagRepository();
        $tags = $repository->fetchAll();
        echo json_encode($tags);
    }
}
