<?php

/**
 * Controle des données de la BBD pour les agences
 */

require_once __DIR__ . '/../Models/Agence.php';

class AgencesController {
    public function index() {
        $agence = new Agence();
        $agences = $agence->getAllAgences();
        require_once __DIR__ . '/../Views/Agences.php';
    }
}


?>