<?php

class inzeraty {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($nazev_vozu, $rok_vyroby, $najeto, $cena, $kontakt) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO inzeraty (nazev_vozu, rok_vyroby, najeto, cena, kontakt) 
                VALUES (:nazev_vozu, :rok_vyroby, :najeto, :cena, :kontakt) ";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':nazev_vozu' => $nazev_vozu,
            ':rok_vyroby' => $rok_vyroby,
            ':najeto' => $najeto,
            ':cena' => $cena,
            ':kontakt' => $kontakt
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM inzeraty ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM inzeraty WHERE id_cislo = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nazev, $rok, $najeto, $cena, $kontakt) {
        $stmt = $this->db->prepare('UPDATE inzeraty SET nazev_vozu = ?, rok_vyroby = ?, najeto = ?, cena = ?, kontakt = ? WHERE id_cislo = ?');
        return $stmt->execute([$nazev, $rok, $najeto, $cena, $kontakt, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM inzeraty WHERE id_cislo = ?');
        return $stmt->execute([$id]);
    }

}