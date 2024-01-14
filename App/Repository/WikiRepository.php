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
        $query = "SELECT w.*, u.username, c.name as category FROM wikis w NATURAL JOIN users u NATURAL JOIN categories c";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }

    public function fetchOneJoined($id)
    {
        $query = "SELECT w.*, u.username, c.name as category FROM wikis w NATURAL JOIN users u NATURAL JOIN categories c WHERE w.wiki_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();

        return $this->generateObj($results)[0];
    }

    public function fetchLatest($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE user_id = ? ORDER BY wiki_id DESC LIMIT 1");
        $stmt->execute([$user_id]);
        $results = $stmt->fetchAll();

        return $this->generateObj($results)[0];
    }

    public function fetchNewest()
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis ORDER BY updated_at DESC LIMIT 10");
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }

    public function searchWiki($condition)
    {
        # $condition = ["type" => "pattern OR not", table => "category", "data" => ["tag_id", 2]]
        $clause = $condition["type"] == "pattern" ? " LIKE " : " = ";
        $columnName = substr($condition["table"], 0, 1) . "." . $condition['data'][0];

        try {
            $query = "SELECT DISTINCT w.title, w.updated_at, w.deleted_at, w.image, u.username, c.name as category
            FROM wikis w
            JOIN wikis_tags wt ON w.wiki_id = wt.wiki_id
            JOIN tags t ON wt.tag_id = t.tag_id
            JOIN users u ON w.user_id = u.user_id
            JOIN categories c ON w.category_id = c.category_id
            WHERE $columnName $clause ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$condition["data"][1]]);
            $results = $stmt->fetchAll();
            return $this->generateObj($results);
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function archive($id, $choice)
    {
        $currDate = $choice ? date("Y-m-d H:i:s") : NULL;
        try {
            $stmt = $this->db->prepare("UPDATE $this->tableName SET deleted_at = ? WHERE wiki_id = ?");
            $stmt->execute([$currDate, $id]);
            return "ok";
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }
}
