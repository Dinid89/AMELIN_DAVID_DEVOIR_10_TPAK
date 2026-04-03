<?php

/**
 * Controle des données de la BBD pour la liste des trajets vu par l'administrateur
 */

require_once __DIR__ . '/../Models/Trajet.php';

class ListTrajetController {
    private $trajetModel;

    public function __construct() {
        $this->trajetModel = new Trajet();
    }

    public function listTrajets() {
        try {
            $trajets = $this->trajetModel->getAllTrajets();
            require_once __DIR__ . '/../Views/ListTrajets.php';
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return [];
        }
    }

}


?>