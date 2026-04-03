<?php

require_once __DIR__ . '/../Models/Agence.php';

class DeleteAgenceController {

    public function delete($id_agence) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['user']['is_admin'])) {
            header('Location: /');
            exit();
        }

        $agenceModel = new Agence();
        $agenceModel->deleteAgence($id_agence);

        $_SESSION['flash'] = "Agence supprimée avec succès !";
        header('Location: /agences');
        exit();
    }
}


?>