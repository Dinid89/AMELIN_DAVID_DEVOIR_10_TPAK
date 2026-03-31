<?php
/**
 * Controller page Login sécurisé
 */

require_once __DIR__ . '/../Models/Login.php';

class LoginController {

    public function login() {
        session_start();

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'] ?? '';


            if (!$email || empty($password)) {
                $error = "Veuillez remplir correctement les champs.";
                require __DIR__ . '/../Views/Login.php';
                return;
            }

            $loginModel = new Login();
            $user = $loginModel->authenticate($email, $password);

            if ($user) {
                // 🔐 Protection contre fixation de session
                session_regenerate_id(true);

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email']
                ];

                header('Location: index.php');
                exit();

            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require __DIR__ . '/../Views/Login.php';
    }
}
?>