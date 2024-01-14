<?php

namespace App\Controllers\Author;

use App\Controllers\Controller;
use App\Repository\WikiRepository;
use App\Repository\WikiTagsRepository;
use App\Repository\TagRepository;
use App\Repository\CategoryRepository;

class WikiController extends Controller
{
    public static function uploadImage()
    {
        $maxFileSize = 5242880;
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        $file = $_FILES["file_img"];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        # Validate file format
        if (!in_array($fileExtension, $allowedFormats)) {
            return ['success' => false, 'msg' => 'Invalid file format.'];
        }

        # Validate file size
        if ($file['size'] > $maxFileSize) {
            return ['success' => false, 'msg' => 'File size exceeds the allowed limit.'];
        }

        # Generate a unique filename
        $uniqueFilename = uniqid('image_') . '.' . $fileExtension;
        $destination = $_SERVER["DOCUMENT_ROOT"] . "/assets/img/" . $uniqueFilename;

        # Move the uploaded file to the destination folder
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return ['success' => true, 'msg' => 'File uploaded successfully.', 'filename' => $uniqueFilename];
        } else {
            return ['success' => false, 'msg' => 'Error moving file to destination.'];
        }
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

            $uploadResult = self::uploadImage();
            if ($uploadResult["success"]) {
                $wikiObj = new WikiRepository();
                $wikiTagsObj = new WikiTagsRepository();
                $result1 = $wikiObj->add([$name, $content, $uploadResult["filename"], $_SESSION['user_id'], $category], ["title", "content", "image", "user_id", "category_id"]);
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

        if (isset($_FILES["file_img"])) {
            $uploadResult = self::uploadImage();
            if ($uploadResult["success"]) {
                $result1 = $wikiObj->update([
                    "data" => [
                        ["title", $name], ["category_id", $category], ["content", $content], ["image", $uploadResult["filename"]]
                    ],
                    "conditions" => [
                        ["wiki_id", (int)$wiki_id]
                    ]
                ]);
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
            if ($result2 = $wikiTagsObj->delete(["wiki_id", $wiki_id])) {
                foreach ($tags as $tag) {
                    $wikiTagsObj->add([$tag, $wiki_id]);
                }
                header("location:/author/wikis");
            } else echo $result2;
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
