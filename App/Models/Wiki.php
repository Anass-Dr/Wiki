<?php

namespace App\Models;

class Wiki
{
    public $id;
    public $title;
    public $content;
    public $createdAt;
    public $updatedAt;
    public $deletedAt;
    public $img;
    public $author;
    public $category;

    #- Setters :
    public function setWiki_id($value)
    {
        $this->id = $value;
    }
    public function setTitle($value)
    {
        $this->title = $value;
    }
    public function setContent($value)
    {
        $this->content = $value;
    }
    public function setCreated_At($value)
    {
        $this->createdAt = $value;
    }
    public function setUpdated_At($value)
    {
        $this->updatedAt = $value;
    }
    public function setDeleted_At($value)
    {
        $this->deletedAt = $value;
    }
    public function setImage($value)
    {
        $this->img = $value;
    }
    public function setUsername($value)
    {
        $this->author = $value;
    }
    public function setCategory_Name($value)
    {
        $this->category = $value;
    }
}
