<?php
    require_once '../models/database.php';
    require_once '../models/user.php';

    session_start();

    $db = (new Database())->getConnection();
    $userModel = new User($db);

    // Zpracování přihlášení

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            die('Vyplňte prosím všechna pole.');
        }

        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password_hash'])) {

            // Úspěšné přihlášení
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../views/index.php");
            exit();
        } else {
            die('Neplatné přihlašovací údaje.');
        }
    } else {
        die('Neplatný požadavek.');
    }