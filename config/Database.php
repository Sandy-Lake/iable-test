<?php
namespace Config;

use PDO;
use PDOException;

class Database {

    private readonly string $host = "mysql";
    private readonly string $database_name = "iable";
    private readonly string $username = "root";
    private readonly string $password = "secret";
    public mixed $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database_name,
                $this->username,
                $this->password);
            $this->conn->exec("SET NAMES UTF8");
        } catch(PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}