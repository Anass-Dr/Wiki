<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class TagController extends Controller
{
    public static function getOne()
    {
        self::setHeaderJson();
        extract($_GET);
        $obj = new \App\Repository\TagRepository();
        $result = $obj->fetchOne([["tag_id", $id]]);
        echo json_encode($result);
    }

    public static function add()
    {
        extract($_POST);
        $obj = new \App\Repository\TagRepository();
        $obj->add([NULL, $name, $desc]);
        header("location:/admin/tags-and-categories");
    }

    public static function update()
    {
        self::setHeaderJson();
        extract($_POST);
        $obj = new \App\Repository\TagRepository();
        $result = $obj->update(
            [
                "data" => [
                    ["name", $name], ["description", $desc]
                ],
                "conditions" => [
                    ["tag_id", $id]
                ]
            ]
        );

        if ($result == 'ok') header("location:/admin/tags-and-categories");
        else echo $result;
    }

    public static function delete()
    {
        extract($_POST);
        $obj = new \App\Repository\TagRepository();
        $result = $obj->delete(["tag_id", $id]);
        if ($result) header("location:/admin/tags-and-categories");
        else echo $result;
    }
}
