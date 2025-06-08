<?php
require_once '../models/database.php';
require_once '../models/inzerat.php';

$pdo = (new Database())->getConnection();
$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID není zadáno.');
}

$inzerat_model = new inzeraty($pdo);
$inzerat = $inzerat_model->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazev_vozu = $_POST['nazev_vozu'];
    $rok_vyroby = $_POST['rok_vyroby'];
    $najeto = $_POST['najeto'];
    $cena = $_POST['cena'];
    $kontakt = $_POST['kontakt'];

    $inzerat_model->update($id, $nazev_vozu, $rok_vyroby, $najeto, $cena, $kontakt);
    header('Location: inzeraty_edit.php');
    exit();
}
?>

<form method="POST">
    <label>Název vozu:</label>
    <input name="nazev_vozu" value="<?= htmlspecialchars($inzerat['nazev_vozu']) ?>"><br>

    <label>Rok výroby:</label>
    <input name="rok_vyroby" value="<?= htmlspecialchars($inzerat['rok_vyroby']) ?>"><br>

    <label>Najeto:</label>
    <input name="najeto" value="<?= htmlspecialchars($inzerat['najeto']) ?>"><br>

    <label>Cena:</label>
    <input name="cena" value="<?= htmlspecialchars($inzerat['cena']) ?>"><br>

    <label>Kontakt:</label>
    <input name="kontakt" value="<?= htmlspecialchars($inzerat['kontakt']) ?>"><br>

    <button type="submit">Uložit změny</button>
    
</form>
