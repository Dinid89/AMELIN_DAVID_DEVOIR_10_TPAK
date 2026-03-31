<?php

/**

*Controle des données de la BBD pour les trajets

*/

require_once __DIR__ . '/../Models/Trajet.php';


class TrajetController {
    public function index() {
        $trajet = new Trajet();
        $trajets = $trajet->getAllTrajets();
        require __DIR__ . '/../Views/Home.php';
    }
}

?>