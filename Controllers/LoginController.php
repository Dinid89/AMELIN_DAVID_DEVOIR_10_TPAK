<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../Models/Login.php';

class LoginController {

    public function showForm() {
        require __DIR__ . '/../Views/Login.php';
    }

    public function login() {
        session_start();
        $error = null;

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $loginModel = new Login();
        $user = $loginModel->authenticate($email, $password);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id'     => $user['id_users'],
                'email'  => $user['mail_users'],
                'prenom' => $user['prenom_users'],
                'nom'    => $user['nom_users']
            ];
            header('Location: /');
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
            require __DIR__ . '/../Views/Login.php';
        }
    }
}
?>