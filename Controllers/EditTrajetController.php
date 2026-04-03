<?php

require_once __DIR__ . '/../Models/Trajet.php';
require_once __DIR__ . '/../Models/Agence.php';

class EditTrajetController {

    public function showForm($id_trajet) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $trajetModel = new Trajet();
        $trajet = $trajetModel->getTrajetById($id_trajet);

        if (!$trajet) {
            header('Location: /');
            exit();
        }

        if ($trajet['id_users'] != $_SESSION['user']['id'] && empty($_SESSION['user']['is_admin'])) {
            header('Location: /');
            exit();
        }

        $agence = new Agence();
        $agences = $agence->getAllAgences();

        require __DIR__ . '/../Views/EditTrajet.php';
    }

    public function update($id_trajet) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $trajetModel = new Trajet();
        $trajet = $trajetModel->getTrajetById($id_trajet);

        if (!$trajet) {
            header('Location: /');
            exit();
        }

        if ($trajet['id_users'] != $_SESSION['user']['id'] && empty($_SESSION['user']['is_admin'])) {
            header('Location: /');
            exit();
        }

        $data = filter_input_array(INPUT_POST, [
            'ville_depart'        => FILTER_VALIDATE_INT,
            'depart_date_trajet'  => FILTER_DEFAULT,
            'ville_arrivee'       => FILTER_VALIDATE_INT,
            'arrivee_date_trajet' => FILTER_DEFAULT,
            'total_place_trajet'  => FILTER_VALIDATE_INT,
            'places_dispo_trajet' => FILTER_VALIDATE_INT
        ]);

        if ($data['ville_depart'] === $data['ville_arrivee']) {
            echo "La ville de départ et d'arrivée doivent être différentes.";
            return;
        }

        if (strtotime($data['arrivee_date_trajet']) <= strtotime($data['depart_date_trajet'])) {
            echo "La date d'arrivée doit être après la date de départ.";
            return;
        }

        $trajetModel->updateTrajet($id_trajet, $data);

        $_SESSION['flash'] = "Trajet modifié avec succès !";
        header('Location: /');
        exit();
    }
}
?>