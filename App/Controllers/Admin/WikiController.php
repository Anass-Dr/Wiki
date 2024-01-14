<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Repository\WikiRepository;

class WikiController extends Controller
{

    public static function index()
    {
        # Get all Wikis :
        $wikiObj = new \App\Repository\WikiRepository();
        $wikis = $wikiObj->getWikisJoined();

        # Get all Tags :
        $tags = [];
        $wikiTagsObj = new \App\Repository\WikiTagsRepository();
        foreach ($wikis as $wiki) {
            $tags[$wiki->id] = $wikiTagsObj->getAllJoined([["wiki_id", $wiki->id]]);
        }

        self::render("admin/wikis", ["wikis" => $wikis, "tags" => $tags]);
    }

    public static function archive()
    {
        $result = '';
        $obj = new WikiRepository();
        if (isset($_POST["archive"])) $result = $obj->archive($_POST["id"], true);
        else $result = $obj->archive($_POST["id"], false);

        if ($result == 'ok') header("location:/admin/wikis");
        else echo $result;
    }
}
