<?php

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
            // Gérer l'erreur, par exemple en affichant un message d'erreur
            echo "Erreur: " . $e->getMessage();
            return [];
        }
    }
}


?>