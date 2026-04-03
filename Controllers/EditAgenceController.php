<?php

/**
 * Controle des données de la BBD la modification des agences
 */

require_once __DIR__ . '/../Models/Agence.php';

class EditAgenceController {

    public function showForm($id_agence) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['user']['is_admin'])) {
            header('Location: /');
            exit();
        }

        $agenceModel = new Agence();
        $agence = $agenceModel->getAgenceById($id_agence);

        if (!$agence) {
            header('Location: /agences');
            exit();
        }

        require __DIR__ . '/../Views/EditAgence.php';
    }

    public function update($id_agence) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['user']['is_admin'])) {
            header('Location: /');
            exit();
        }

        $ville_agence = trim($_POST['ville_agence'] ?? '');

        if (empty($ville_agence)) {
            echo "La ville de l'agence est requise.";
            return;
        }

        $agenceModel = new Agence();
        $agenceModel->updateAgence($id_agence, $ville_agence);

        $_SESSION['flash'] = "Agence modifiée avec succès !";
        header('Location: /agences');
        exit();
    }
}

?>