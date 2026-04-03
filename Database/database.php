<?php
/**
 * Récupération de la base de données PHPMyAdmin
 * 
 */

class Database {
    private $host = 'localhost';
    private $db_name = 'tpak';
    private $username = 'root';
    private $password = '';

    public function __construct() {
        $this->host = $_ENV['DB_HOST'] ?? $this->host;
        $this->db_name = $_ENV['DB_NAME'] ?? $this->db_name;
        $this->username = $_ENV['DB_USERNAME'] ?? $this->username;
        $this->password = $_ENV['DB_PASSWORD'] ?? $this->password;
    }

    public function getConnection() {
        try {
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

}

?>