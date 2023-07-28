<?php
namespace Models;

use Interfaces\ModelInterface;
use PDO;
use PDOStatement;

class Course implements ModelInterface
{
    private PDO $conn;

    private string $table = "courses";

    public int $id;
    public string $name;
    public string $instructor;
    public string $description;
    public string $credits;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function all(): bool|PDOStatement
    {
        $sqlQuery = "SELECT id, name, instructor, description, credits FROM " . $this->table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(object $data): array
    {
        $this->name = $data->name;
        $this->instructor = $data->instructor;
        $this->description = $data->description;
        $this->credits = $data->credits;

        $sqlQuery = "INSERT INTO
                        ". $this->table ."
                    SET
                        name = :name, 
                        instructor = :instructor, 
                        description = :description, 
                        credits = :credits";

        $this->getStmt($sqlQuery, $stmt);

        $stmt->execute();
        $lastId = $stmt->lastInsertId();
        $query = $stmt->prepare("SELECT * FROM ". $this->table." WHERE id = ". $lastId);
        return $query->execute()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): array
    {
        $sqlQuery = "SELECT
                        id, 
                        name, 
                        instructor, 
                        description, 
                        credits
                      FROM
                        ". $this->table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->id = $this->sanitize($id);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute(['id' => $this->id])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(object $data): bool
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->instructor = $data->instructor;
        $this->description = $data->description;
        $this->credits = $data->credits;

        $sqlQuery = "UPDATE
                ". $this->table ."
            SET
                name = :name, 
                instructor = :instructor, 
                description = :description, 
                credits = :credits
            WHERE 
                id = :id";

        $this->getStmt($sqlQuery, $stmt);

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $sqlQuery = "DELETE FROM " . $this->table . " WHERE id = ?";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = $this->sanitize($id);

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {

            return true;
        }
        return false;
    }

    private function sanitize($property): string
    {
        return htmlspecialchars(strip_tags($property));
    }

    /**
     * @param string $sqlQuery
     * @param $stmt
     */
    private function getStmt(string $sqlQuery, &$stmt): void
    {
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = $this->sanitize($this->id);
        $this->name = $this->sanitize($this->name);
        $this->instructor = $this->sanitize($this->instructor);
        $this->description = $this->sanitize($this->description);
        $this->credits = $this->sanitize($this->credits);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":instructor", $this->instructor);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":credits", $this->credits);
    }
}