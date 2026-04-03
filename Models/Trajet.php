<?php

require_once __DIR__ . '/../Database/database.php';

class Trajet {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

/**
 * Récupération de tous les trajets disponibles avec les noms des villes de départ et d'arrivée,
 */     

    public function getAllTrajets() {
        try {
            $stmt = $this->pdo->query("
            SELECT t.*, 
            a_dep.ville_agence AS ville_depart,
            a_arr.ville_agence AS ville_arrivee,
            u.prenom_users, 
            u.nom_users, 
            u.phone_users, 
            u.mail_users
            FROM trajets t
            JOIN agences a_dep ON t.depart_agence_trajet = a_dep.id_agence
            JOIN agences a_arr ON t.arrivee_agence_trajet = a_arr.id_agence
            JOIN users u ON t.id_users = u.id_users
            WHERE t.places_dispo_trajet > 0 
            AND t.depart_date_trajet > NOW() 
            ORDER BY t.depart_date_trajet ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des trajets: " . $e->getMessage());
        }
    }

/**
 * Création d'un nouveau trajet en insérant les données dans la table trajets
 */ 
    
    public function createTrajet($data) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO trajets (id_users, depart_agence_trajet, depart_date_trajet, arrivee_agence_trajet, arrivee_date_trajet, total_place_trajet, places_dispo_trajet)
                VALUES (:id_users, :depart_agence_trajet, :depart_date_trajet, :arrivee_agence_trajet, :arrivee_date_trajet, :total_place_trajet, :places_dispo_trajet)
            ");
            $stmt->execute([
                ':id_users' => $data['id_users'],
                ':depart_agence_trajet' => $data['ville_depart'],
                ':depart_date_trajet' => $data['depart_date_trajet'],
                ':arrivee_agence_trajet' => $data['ville_arrivee'],
                ':arrivee_date_trajet' => $data['arrivee_date_trajet'],
                ':total_place_trajet' => $data['total_place_trajet'],
                ':places_dispo_trajet' => $data['places_dispo_trajet']
            ]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la création du trajet: " . $e->getMessage());
        }
    }

/**
 * Récupère les trajets par ID
 */     

    public function getTrajetById($id_trajets) {
    try {
        $stmt = $this->pdo->prepare("
            SELECT t.*, 
            a_dep.ville_agence AS ville_depart,
            a_arr.ville_agence AS ville_arrivee,
            u.prenom_users, 
            u.nom_users, 
            u.phone_users, 
            u.mail_users
            FROM trajets t
            JOIN agences a_dep ON t.depart_agence_trajet = a_dep.id_agence
            JOIN agences a_arr ON t.arrivee_agence_trajet = a_arr.id_agence
            JOIN users u ON t.id_users = u.id_users
            WHERE t.id_trajets = :id_trajets
        ");
        $stmt->execute([':id_trajets' => $id_trajets]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération du trajet: " . $e->getMessage());
    }
}

/**
 * Modifier les trajets
 */ 

    public function updateTrajet($id_trajets, $data) {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE trajets 
                SET depart_agence_trajet = :depart_agence_trajet, 
                    depart_date_trajet = :depart_date_trajet, 
                    arrivee_agence_trajet = :arrivee_agence_trajet, 
                    arrivee_date_trajet = :arrivee_date_trajet, 
                    total_place_trajet = :total_place_trajet, 
                    places_dispo_trajet = :places_dispo_trajet
                WHERE id_trajets = :id_trajets
            ");
            $stmt->execute([
                ':depart_agence_trajet' => $data['ville_depart'],
                ':depart_date_trajet' => $data['depart_date_trajet'],
                ':arrivee_agence_trajet' => $data['ville_arrivee'],
                ':arrivee_date_trajet' => $data['arrivee_date_trajet'],
                ':total_place_trajet' => $data['total_place_trajet'],
                ':places_dispo_trajet' => $data['places_dispo_trajet'],
                ':id_trajets' => $id_trajets
            ]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour du trajet: " . $e->getMessage());
        }
    }

/**
 * Supprimer un trajet de la base de données
 */     

    public function deleteTrajet($id_trajets) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM trajets WHERE id_trajets = :id_trajets");
            $stmt->execute([':id_trajets' => $id_trajets]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du trajet: " . $e->getMessage());
        }
    }
}



?>