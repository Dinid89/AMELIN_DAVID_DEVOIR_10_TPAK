<?php

require_once __DIR__ . '/../Database/database.php';

class Login {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

/**
 * Authentification de l'utilisateur en vérifiant l'email et le mot de passe
 */     

    public function authenticate($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE mail_users = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_users'])) {
            return $user;
        }
        return false;
    }
}
?>