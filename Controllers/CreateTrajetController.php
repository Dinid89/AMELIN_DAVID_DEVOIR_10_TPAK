<?php

require_once __DIR__ . '/../Models/Agence.php';
require_once __DIR__ . '/../Models/Trajet.php';

class CreateTrajetController {

    public function showForm() {
        $agence = new Agence();
        $agences = $agence->getAllAgences();
        require __DIR__ . '/../Views/CreateTrajet.php';
    }

    public function store() {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
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

        $data['id_users'] = $_SESSION['user']['id'];

        $trajet = new Trajet();
        $trajet->createTrajet($data);

        header('Location: /');
        exit();
    }
}