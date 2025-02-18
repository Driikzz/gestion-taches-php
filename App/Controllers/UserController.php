<?php

use App\models\User;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../config/database.php';


class UserController {
    private $userModel;

    public function __construct() {
        global $pdo;
        $this->userModel = new User($pdo);
    }

    public function showLoginForm() {
      require_once __DIR__ . '/../../App/Views/login.php';
    }

    public function showRegisterForm() {
      require_once __DIR__ . '/../../App/Views/register.php';

    }

    public function register() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($this->userModel->addUser($name, $email, $password)) {
                header("Location: /");
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }

    public function login() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = $this->userModel->loginUser($email, $password);

            if ($user) {
                $_SESSION["user_id"] = $user["id"];
                header("Location: /tasks");
                exit();
            } else {
                echo "Identifiants incorrects.";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit();
    }

    public function deleteUser($id) {
        session_start();

        if (!isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }

        if ($this->userModel->deleteUser($id)) {
            echo "Utilisateur supprimé.";
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
