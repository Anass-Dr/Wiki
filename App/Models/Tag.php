<?php

namespace App\Models;

class Tag
{
    public $id;
    public $name;

    //
    public function setTag_Id($value)
    {
        $this->id = $value;
    }
    public function setTag_Name($value)
    {
        $this->name = $value;
    }
}
