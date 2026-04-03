<?php

/**
 * Controle des données de la BBD pour la création d'agences
 */

require_once __DIR__ . '/../Models/Agence.php';

class CreateAgenceController {

    public function showForm() {
        require __DIR__ . '/../Views/CreateAgence.php';
    }

    public function store() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $ville_agence = trim($_POST['ville_agence'] ?? '');

        if (empty($ville_agence)) {
            echo "Le nom de la ville est requis.";
            return;
        }

        $agenceModel = new Agence();
        $agenceModel->createAgence($ville_agence);

        /**
        * message flash 
        */

        $_SESSION['flash'] = "Agence créée avec succès !";
        header('Location: /agences');
        exit();
    }
}
?>