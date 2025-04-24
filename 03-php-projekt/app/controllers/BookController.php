<?php
require_once '../models/Database.php';
require_once '../models/Book.php';

class BookController {
    private $db;
    private $bookModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->bookModel = new Book($this->db);
    }

    public function createBook() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $category = htmlspecialchars($_POST['category']);
            $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
            $year = intval($_POST['year']);
            $price = floatval($_POST['price']);
            $isbn = htmlspecialchars($_POST['isbn']);
            $description = htmlspecialchars($_POST['description']);
            $link = htmlspecialchars($_POST['link']);
            $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;

            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename;
                    }
                }
            }

            if ($this->bookModel->create($title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link, $imagePaths, $user_id)) {
                header("Location: ../controllers/book_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listBooks() {
        $books = $this->bookModel->getAll();
        include '../views/books/book_list.php';
    }
}

// Call method on form submit
$controller = new BookController();
$controller->createBook();
