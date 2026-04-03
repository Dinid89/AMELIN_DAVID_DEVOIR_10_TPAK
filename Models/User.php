<?php

/**
 * Récupère les données de la BBD pour les utilisateurs
 */

require_once __DIR__ . '/../Database/database.php';

class User {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

/**
 * Récuèpération de tous les utilisateurs de la base de données
 */     

    public function getAllUsers() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des utilisateurs: " . $e->getMessage());
        }
    }
}

?>