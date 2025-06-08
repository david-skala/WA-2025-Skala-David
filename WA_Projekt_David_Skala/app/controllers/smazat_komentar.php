<?php
session_start();
require_once '../models/database.php';
require_once '../models/komentare.php';

if (!isset($_SESSION['username'])) {
    header('Location: ../views/prihlaseni.php');
    exit();
}

$database = new Database();
$pdo = $database->getConnection();

$komentar_model = new komentare($pdo);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $komentar_model->delete($id);
}

header('Location: ../views/komentare_edit.php');
exit();

?>
