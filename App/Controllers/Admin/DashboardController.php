<?php

namespace App\Controllers\Admin;

use App\Repository\WikiRepository;

class DashboardController extends \App\Controllers\Controller
{
    public static function index()
    {
        # Get All Wikis :
        $wikiObj = new WikiRepository();
        $wikisCount = count($wikiObj->fetchAll());

        # Get All Categories :
        $categoryObj = new \App\Repository\CategoryRepository();
        $categoriesCount = count($categoryObj->fetchAll());

        # Get All Tags :
        $tagObj = new \App\Repository\TagRepository();
        $tagsCount = count($tagObj->fetchAll());

        # Get All Author :
        $authorObj = new \App\Repository\UserRepository();
        $authorsCount = count($authorObj->fetchAllAuthors());

        self::render('admin/dashboard', [
            "wikisCount" => $wikisCount, "categoriesCount" => $categoriesCount,
            "tagsCount" => $tagsCount, "authorsCount" => $authorsCount
        ]);
    }

    public static function showTagsCategoriesPage()
    {
        $categoryObj = new \App\Repository\CategoryRepository();
        $tagObj = new \App\Repository\TagRepository();
        $tags = $tagObj->fetchAll();
        $categories = $categoryObj->fetchAll();

        self::render('admin/tags&categories', ["tags" => $tags, "categories" => $categories]);
    }

    public static function add()
    {
        $type = $_POST["type"];
        if ($type === "tag") TagController::add();
        else CategoryController::add();
    }

    public static function get()
    {
        $type = $_GET["type"];
        if ($type === "tag") TagController::getOne();
        else CategoryController::getOne();
    }

    public static function update()
    {
        $type = $_POST["type"];
        if ($type === "tag") TagController::update();
        else CategoryController::update();
    }

    public static function delete()
    {
        $type = $_POST["type"];
        if ($type === "tag") TagController::delete();
        else CategoryController::delete();
    }
}
