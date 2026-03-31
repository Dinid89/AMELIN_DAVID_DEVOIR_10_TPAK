<?php

require_once __DIR__ . '/../Database/database.php';

class Trajet {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getAllTrajets() {
        try {
            $stmt = $this->pdo->query("
            SELECT t.*, 
           a_dep.ville_agence AS ville_depart,
           a_arr.ville_agence AS ville_arrivee
            FROM trajets t
            JOIN agences a_dep ON t.depart_agence_trajet = a_dep.id_agence
            JOIN agences a_arr ON t.arrivee_agence_trajet = a_arr.id_agence
            WHERE t.places_dispo_trajet > 0 
            AND t.depart_date_trajet > NOW() 
            ORDER BY t.depart_date_trajet ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des trajets: " . $e->getMessage());
        }
    }
}



?>