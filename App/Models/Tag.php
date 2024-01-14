<?php

namespace App\Models;

class Tag
{
    public $id;
    public $name;
    public $description;

    public function getTag_Id()
    {
        return $this->id;
    }

    public function setTag_Id($id)
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
