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

    /**
 * Récupère toutes les agences de la base de données
 */
    public function getAllAgences() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM agences");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des agences: " . $e->getMessage());
        }
    }

    /**
 * Crée une nouvelle agence dans la base de données
 */

    public function createAgence($ville_agence) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO agences (ville_agence) VALUES (:ville_agence)");
            $stmt->bindParam(':ville_agence', $ville_agence, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la création de l'agence: " . $e->getMessage());
        }
    }

/**
 * récupère une agence par son ID
 */

    public function getAgenceById($id_agence) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM agences WHERE id_agence = :id_agence");
            $stmt->bindParam(':id_agence', $id_agence, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération de l'agence: " . $e->getMessage());
        }
    }

/**
 * modifier une agence dans la base de données
 */

    public function updateAgence($id_agence, $ville_agence) {
        try {
            $stmt = $this->pdo->prepare("UPDATE agences SET ville_agence = :ville_agence WHERE id_agence = :id_agence");
            $stmt->bindParam(':ville_agence', $ville_agence, PDO::PARAM_STR);
            $stmt->bindParam(':id_agence', $id_agence, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour de l'agence: " . $e->getMessage());
        }
    }

/**
 * Supprimer une agence de la base de données
 */    

    public function deleteAgence($id_agence) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM agences WHERE id_agence = :id_agence");
            $stmt->bindParam(':id_agence', $id_agence, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'agence: " . $e->getMessage());
        }
    }

    
}

?>