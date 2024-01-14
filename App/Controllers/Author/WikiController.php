<?php

namespace App\Controllers\Author;

use App\Controllers\Controller;
use App\Repository\WikiRepository;
use App\Repository\WikiTagsRepository;
use App\Repository\TagRepository;
use App\Repository\CategoryRepository;

class WikiController extends Controller
{
    public static function uploadImg()
    {
        $fileDir = $_SERVER["DOCUMENT_ROOT"] . "/assets/img/" . $_FILES["file_img"]["name"];
        return move_uploaded_file($_FILES["file_img"]["tmp_name"], $fileDir);
    }

    public static function index()
    {
        # Get all Wikis :
        $wikiObj = new WikiRepository();
        $wikis = $wikiObj->getWikisJoined();

        # Get all Tags :
        $tags = [];
        $wikiTagsObj = new WikiTagsRepository();
        foreach ($wikis as $wiki) {
            $tags[$wiki->id] = $wikiTagsObj->getAllJoined([["wiki_id", $wiki->id]]);
        }

        self::render("author/wikis", ["wikis" => $wikis, "tags" => $tags]);
    }

    public static function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $tagObj = new TagRepository();
            $categoryObj = new CategoryRepository();
            $tags = $tagObj->fetchAll();
            $categories = $categoryObj->fetchAll();

            self::render("author/add", ["tags" => $tags, "categories" => $categories]);
        } else {
            extract($_POST);

            if (self::uploadImg()) {
                $wikiObj = new WikiRepository();
                $wikiTagsObj = new WikiTagsRepository();
                $result1 = $wikiObj->add([$name, $content, $_FILES["file_img"]["name"], $_SESSION['user_id'], $category], ["title", "content", "image", "user_id", "category_id"]);
                $result2 = $wikiTagsObj->addToLast($tags);

                if ($result1 && $result2) header("location:/author/wikis");
            } else {
                echo "Error: " . $_FILES["file_img"]["error"];
            }
        }
    }

    public static function updateHTML()
    {
        # Get Target Wiki Info :
        $wikiObj = new WikiRepository();
        $wiki = $wikiObj->fetchOne([["wiki_id", $_GET["id"]]]);

        # Get Target Wiki Tags :
        $wikiTagsObj = new WikiTagsRepository();
        $wikiTags = $wikiTagsObj->getAllJoined([["wiki_id", $wiki->id]]);

        # Get all Tags :
        $tagObj = new TagRepository();
        $tags = $tagObj->fetchAll();

        # Get all Categories :
        $categoryObj = new CategoryRepository();
        $categories = $categoryObj->fetchAll();

        self::render("author/update", ["tags" => $tags, "categories" => $categories, "wikiObj" => $wiki, "wikiTags" => $wikiTags]);
    }

    public static function update()
    {
        extract($_POST);
        $wikiObj = new WikiRepository();
        $wikiTagsObj = new WikiTagsRepository();
        $result1 = '';

        if (isset($file_img)) {
            if (self::uploadImg()) {
                $result1 = $wikiObj->update(["data" => [["title", $name], ["category_id", $category], ["content", $content], ["image", $_FILES["file_img"]["name"]]], "conditions" => ["user_id", (int)$_SESSION["user_id"]]]);
            }
        } else {
            $result1 = $wikiObj->update([
                "data" => [
                    ["title", $name], ["category_id", $category], ["content", $content]
                ],
                "conditions" => [
                    ["wiki_id", (int)$wiki_id]
                ]
            ]);
        }
        if ($result1) {
            if ($wikiTagsObj->delete([["wiki_id", $wiki_id]])) {
                foreach ($tags as $tag) {
                    $wikiTagsObj->add([$tag, $wiki_id]);
                }
                header("location:/author/wikis");
            };
        } else echo $result1;
    }

    public static function delete()
    {
        $obj = new WikiRepository();
        $result = $obj->delete(["wiki_id", $_POST["id"]]);

        if ($result) header("location:/author/wikis");
        else echo $result;
    }
}
