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
    public $username;
    public $cat_name;

    #- Getters :
    public function getWiki_id($value)
    {
        $this->id = $value;
    }
    public function getTitle($value)
    {
        $this->title = $value;
    }
    public function getContent($value)
    {
        $this->content = $value;
    }
    public function getCreated_At($value)
    {
        $this->createdAt = $value;
    }
    public function getUpdated_At($value)
    {
        $this->updatedAt = $value;
    }
    public function getDeleted_At($value)
    {
        $this->deletedAt = $value;
    }
    public function getImg($value)
    {
        $this->img = $value;
    }
    public function getUsername($value)
    {
        $this->username = $value;
    }
    public function getCat_Name($value)
    {
        $this->cat_name = $value;
    }

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
    public function setImg($value)
    {
        $this->img = $value;
    }
    public function setUsername($value)
    {
        $this->username = $value;
    }
    public function setCat_Name($value)
    {
        $this->cat_name = $value;
    }
}
