<?php

namespace Models;

class Table
{
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $registry = \Registry::getInstance();
        $config = require '../src/config/dbconfig.php';
        $db = \DB::getDB($config);
        $registry->setDB($db);
        $registry->setDB($db);
        $db = $registry->getDB();
        $this->pdo = $db->getPDO();
    }

    public function all(): bool|array
    {
        $sqlQuery = "SELECT * FROM " . $this->table;
        $query = $this->pdo->query($sqlQuery);
        return $query->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function find(int $id): array
    {
        $id = $this->sanitize($id);
        $queryText = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $query = $this->pdo->prepare($queryText);
        $result = $query->execute(['id' => $id]);
        return $query->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function insert($fields)
    {
        $fields = $this->sanitize($fields);
        $queryText = "INSERT INTO ". $this->table." SET";
        $k = 0;
        foreach ($fields as $key=>$field) {
                $rightkey = $key;
            $queryText .= ($k > 0 ? "," : "") . " ".$key." = :". $rightkey;
            $k++;
        }
        $result = $this->pdo->prepare($queryText);
        $result->execute($fields);
        $lastId = $this->pdo->lastInsertId();
        $query = $this->pdo->prepare("SELECT * FROM ". $this->table." WHERE id = ". $lastId);
        $insertedString = $query->execute();
        return $query->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function update(array $fields): bool
    {
        $id = $fields['id'];
        unset($fields['id']);
        $fields = $this->sanitize($fields);
        $queryText = "UPDATE ". $this->table ." SET";
        $k = 0;
        foreach ($fields as $key=>$field) {
            $rightkey = $key;
            $queryText .= ($k > 0 ? "," : "") . " ".$key." = :". $rightkey;
            $k++;
        }
        $queryText .= " WHERE id = :id";
        $fields['id'] = $id;
        $result = $this->pdo->prepare($queryText);
        if ($result->execute($fields)) {
            return true;
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $id = $this->sanitize($id);
        $sqlQuery = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->pdo->prepare($sqlQuery);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    private function sanitize($data): array|string
    {
        if (is_array($data)) {
            foreach ($data as &$item) {
                $item = htmlspecialchars(strip_tags($item));
            }
            return $data;
        } else {
            return htmlspecialchars(strip_tags($data));
        }
    }
}


