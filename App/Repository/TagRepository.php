<?php

namespace App\Repository;

class TagRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\Tag::class, 'tags');
    }
}
