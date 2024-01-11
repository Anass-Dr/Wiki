<?php

namespace App\Repository;

class Repository
{
    protected $db;

    public function __construct(public $className, public $tableName)
    {
        $this->db = \App\Core\Database::getInstance()->connect();
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
        $values = [];
        $query = "SELECT * FROM $this->tableName WHERE";
        foreach ($conditions as $key => $value) {
            $values[] = $value[1];
            $query .= " $value[0] = ? ";
            $query .= $key == count($conditions) - 1 ? '' : ' AND ';
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

    public function fetchAll($conditions = [])
    {
        $query = "SELECT * FROM $this->tableName";
        if (count($conditions)) {
            $query .= " WHERE ";
            foreach ($conditions as $key => $value) {
                $query .= "$key = $value";
            }
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->generateObj($results);
    }

    public function add($data)
    {
        $placeholders = [];
        foreach ($data as $item) $placeholders[] = '?';
        $placeholders = implode(", ", $placeholders);


        try {
            $query = "INSERT INTO $this->tableName VALUES($placeholders)";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return 'ok';
        } catch (\Exception $e) {
            return "erro message: $e";
        }
    }
}
