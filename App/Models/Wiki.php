<?php

namespace App\Models;

class Wiki
{
    public $id;
    public $title;
    public $content;
    public $updatedAt;
    public $deletedAt;
    public $img;
    public $author;
    public $category;
    public $category_id;

    public function getWiki_id()
    {
        return $this->id;
    }

    public function setWiki_id($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getUpdated_At()
    {
        return $this->updatedAt;
    }

    public function setUpdated_At($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeleted_At()
    {
        return $this->deletedAt;
    }

    public function setDeleted_At($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function setImage($img)
    {
        $this->img = $img;
    }

    public function getUsername()
    {
        return $this->author;
    }

    public function setUsername($author)
    {
        $this->author = $author;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }
}
