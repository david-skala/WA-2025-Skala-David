<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Pro přidání komentáře musíte být přihlášeni.");
}

$user_id = $_SESSION['user_id'];
$comment = trim($_POST['comment']);

if ($comment !== "") {
    require_once '../models/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    // Get the page where the form was submitted from
    $page_path = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH); // e.g., '/views/about.php'
    $page_path = basename($page_path); // Optional: get just the filename like 'about.php'

    try {
        $sql = "INSERT INTO comments (user_id, comment, page_path) VALUES (:user_id, :comment, :page_path)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':page_path', $page_path, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: $_SERVER[HTTP_REFERER]");
            exit;
        } else {
            echo "Chyba při ukládání komentáře.";
        }
    } catch (PDOException $e) {
        echo "Chyba databáze: " . $e->getMessage();
    }
} else {
    echo "Komentář nemůže být prázdný.";
}

?>

