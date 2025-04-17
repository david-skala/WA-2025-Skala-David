<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password_hash = htmlspecialchars($_POST['password_hash']);
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->userModel->create($username, $email, $password_hash, $name, $surname)) {
                header("Location: ../views/auth/login.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listBooks () {
        $books = $this->userModel->getAll();
        include '../views/auth/login.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new UserController();
$controller->createUser();
