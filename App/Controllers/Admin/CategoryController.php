<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class CategoryController extends Controller
{
    public static function getOne()
    {
        self::setHeaderJson();
        extract($_GET);
        $obj = new \App\Repository\CategoryRepository();
        $result = $obj->fetchOne([["category_id", $id]]);
        echo json_encode($result);
    }

    public static function add()
    {
        extract($_POST);
        $obj = new \App\Repository\CategoryRepository();
        $obj->add([NULL, $name, $desc]);
        header("location:/admin/tags-and-categories");
    }

    public static function update()
    {
        self::setHeaderJson();
        extract($_POST);
        $obj = new \App\Repository\CategoryRepository();
        $result = $obj->update(
            [
                "data" => [
                    ["name", $name], ["description", $desc]
                ],
                "conditions" => [
                    ["category_id", (int)$id]
                ]
            ]
        );

        if ($result == 'ok') header("location:/admin/tags-and-categories");
        else echo $result;
    }

    public static function delete()
    {
        extract($_POST);
        $obj = new \App\Repository\CategoryRepository();
        $result = $obj->delete(["category_id", $id]);
        if ($result) header("location:/admin/tags-and-categories");
        else echo $result;
    }
}
