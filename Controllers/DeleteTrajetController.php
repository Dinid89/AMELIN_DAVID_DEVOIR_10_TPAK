<?php

require_once __DIR__ . '/../Models/Trajet.php';

class DeleteTrajetController {

    public function delete($id) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $trajetModel = new Trajet();
        $trajetModel->deleteTrajet($id);

        $_SESSION['flash'] = "Trajet supprimé avec succès.";
        header('Location: /');
        exit();
    }
}