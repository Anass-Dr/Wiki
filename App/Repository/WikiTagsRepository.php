<?php

namespace App\Repository;

class WikiTagsRepository extends Repository
{
    public function __construct()
    {
        Parent::__construct(\App\Models\WikiTags::class, 'wikis_tags');
    }

    public function addToLast($tags)
    {
        $wikiObj = new WikiRepository();
        $item = $wikiObj->fetchLatest($_SESSION["user_id"]);

        try {
            $values = "";
            $params = [];
            foreach ($tags as $key => $value) {
                $params[] = $value;
                $params[] = $item->id;
                $values .= "(?, ?)";
                if ($key < count($tags) - 1) $values .= ", ";
            }

            $params = array_map(fn ($item) => (int) $item, $params);

            $stmt = $this->db->prepare("INSERT INTO $this->tableName VALUES$values");
            $stmt->execute($params);
            return "ok";
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function getAllJoined($conditions = [])
    {
        $values = [];
        $query = "select wt.*, w.title as wiki_name, t.name as tag_name FROM wikis_tags wt natural join wikis w natural join tags t";
        if (count($conditions)) {
            $query .= " WHERE ";
            foreach ($conditions as $key => $value) {
                $values[] = $value[1];
                $query .= " $value[0] = ? ";
                $query .= $key == count($conditions) - 1 ? '' : ' AND ';
            }
        }
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($values);
            $results = $stmt->fetchAll();
            return $this->generateObj($results);
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }
}
