<?php
require_once '../models/Database.php';
require_once '../models/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database())->getConnection();
    $userModel = new User($db);

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

        header("Location: ../controllers/book_list.php");
        exit();
    } else {
        die('Neplatné přihlašovací údaje.');
    }
} else {
    die('Neplatný požadavek.');
}