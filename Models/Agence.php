<?php

/**
 * Modèle de données pour les agences
 */


require_once __DIR__ . '/../Database/database.php';

class Agence {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getAllAgences() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM agences");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des agences: " . $e->getMessage());
        }
    }
}

?>