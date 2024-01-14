<?php

namespace App\Repository;

class CategoryRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\Category::class, 'categories');
    }
}
