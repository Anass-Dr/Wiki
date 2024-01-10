<?php

namespace App\Models;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;

    //
    public function setUser_Id($value)
    {
        $this->id = $value;
    }
    public function setUsername($value)
    {
        $this->name = $value;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function setPassword($value)
    {
        $this->password = $value;
    }
    public function setRole($value)
    {
        $this->role = $value;
    }
}
