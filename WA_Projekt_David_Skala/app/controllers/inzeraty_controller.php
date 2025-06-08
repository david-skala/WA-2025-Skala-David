<?php
require_once '../models/database.php';
require_once '../models/inzerat.php';

class inzerat_controller {
    private $db;
    private $inzerat_model;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->inzerat_model = new inzeraty($this->db);
    }

    public function create_inzerat() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nazev_vozu = htmlspecialchars($_POST['nazev_vozu']);
            $rok_vyroby = intval($_POST['rok_vyroby']);
            $najeto = intval($_POST['najeto']);
            $cena = intval($_POST['cena']);
            $kontakt = htmlspecialchars($_POST['kontakt']);

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->inzerat_model->create($nazev_vozu, $rok_vyroby, $najeto, $cena, $kontakt)) {
                header("Location: ../views/databaze.php");
                exit();
            } else {
                echo "Chyba při ukládání inzerátu.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new inzerat_controller ();
$controller->create_inzerat();