<?php

/**
 * Controle des données de la BBD pour les utilisateurs
 */

require_once __DIR__ . '/../Models/User.php';

class UsersController {
    public function index() {
        $user = new User();
        $users = $user->getAllUsers();
        require_once __DIR__ . '/../Views/Users.php';
    }
}

?>