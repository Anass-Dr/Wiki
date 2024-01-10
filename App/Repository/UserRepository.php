<?php

namespace App\Repository;

class UserRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\User::class, 'users');
    }
}
