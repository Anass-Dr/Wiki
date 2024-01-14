<?php

namespace App\Repository;

class UserRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\User::class, 'users');
    }

    public function fetchAllAuthors()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE role = 'Author'");
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $this->generateObj($results);
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }
}
