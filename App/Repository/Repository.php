<?php

namespace App\Repository;

class Repository
{
    protected $db;

    public function __construct(public $className, public $tableName)
    {
        $this->db = \App\Core\Database::getInstance()->connect();
    }

    protected function generateQuery($conditions)
    {
        $values = [];
        $query = "SELECT * FROM $this->tableName";
        if (count($conditions)) {
            $query .= " WHERE ";
            foreach ($conditions as $key => $value) {
                $values[] = $value[1];
                $query .= " $value[0] = ? ";
                $query .= $key == count($conditions) - 1 ? '' : ' AND ';
            }
        }
        return ["query" => $query, "params" => $values];
    }

    protected function generateObj($results)
    {
        $items = [];

        $setters = array_filter(get_class_methods(new $this->className()), function ($method) {
            return 'set' === substr($method, 0, 3);
        });

        foreach ($results as $result) {
            $obj = new $this->className();
            foreach ($setters as $setter) {
                $property = strtolower(str_replace("set", "", $setter));
                $value = $result[$property] ?? '';

                $obj->$setter($value);
            }

            $items[] = $obj;
        }

        return $items;
    }

    public function fetchOne($conditions)
    {
        extract($this->generateQuery($conditions));
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $results = $stmt->fetchAll();
            return $this->generateObj($results)[0];
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function fetchAll($conditions = [])
    {
        extract($this->generateQuery($conditions));
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }

    public function add($data, $columns = [])
    {
        $tableCols = implode(", ", $columns);
        $placeholders = [];
        foreach ($data as $item) $placeholders[] = '?';
        $placeholders = implode(", ", $placeholders);


        try {
            $query = "INSERT INTO $this->tableName ($tableCols) VALUES($placeholders)";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return 'ok';
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function update($items)
    {
        # ["data" => [["id", 1]], "conditions" => ["id", 1]];
        $values = "";
        $conditions = "";
        $params = [];

        foreach ($items["data"] as $key => $value) {
            $params[] = $value[1];
            $values .= "$value[0] = ?";
            if ($key < count($items["data"]) - 1) $values .= ", ";
        }

        foreach ($items["conditions"] as $key => $value) {
            $params[] = $value[1];
            $conditions .= "$value[0] = ?";
            if ($key < count($items["conditions"]) - 1) $conditions .= " AND ";
        }

        try {
            $query = "UPDATE $this->tableName SET $values WHERE $conditions";
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return 'ok';
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function delete($condition)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM $this->tableName WHERE $condition[0] = ?");
            $stmt->execute([$condition[1]]);
            return 'ok';
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }

    public function search($condition)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $this->tableName WHERE $condition[0] LIKE ?");
            $stmt->execute([$condition[1]]);
            $results = $stmt->fetchAll();
            return $this->generateObj($results);
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }
}
