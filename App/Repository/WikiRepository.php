<?php

namespace App\Repository;

class WikiRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\Wiki::class, 'wikis');
    }

    public function getWikisJoined()
    {
        $query = "SELECT w.*, u.username, c.cat_name FROM wikis w NATURAL JOIN users u NATURAL JOIN categories c";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }

    public function fetchLatest()
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis ORDER BY created_at DESC LIMIT 10");
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }
}
