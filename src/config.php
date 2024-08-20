<?php
namespace App;

use PDO;
use PDOException;

class Config {
    private $connection;

    public function __construct($dsn, $username, $password) {
        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
