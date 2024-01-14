<?php

namespace App\Models;

class Category
{
    public $id;
    public $name;
    public $description;

    public function getCategory_Id()
    {
        return $this->id;
    }

    public function setCategory_Id($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
