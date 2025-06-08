<?php
require_once '../models/database.php';
require_once '../models/inzerat.php';

$pdo = (new Database())->getConnection();
$id = $_GET['id'] ?? null;

if ($id) {
    $inzerat_model = new inzeraty($pdo);
    $inzerat_model->delete($id);
}

header('Location: ../views/inzeraty_edit.php');
exit();
