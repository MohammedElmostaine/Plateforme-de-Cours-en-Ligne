<?php
// Database connection (db_connection.php)
class Database {
    private $host = 'localhost';
    private $dbname = 'youdemy';
    private $user = 'root';
    private $password = 'Skimo@1999';
    private $pdo = null;

    public function connect() {
        if ($this->pdo == null) {
            try {
                $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}



?>