<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../models/database.php';
require_once '../models/komentare.php';

$database = new Database();
$pdo = $database->getConnection();

if (!isset($_SESSION['username'])) {
    header('Location: prihlaseni.php');
    exit();
}

$stmt = $pdo->prepare('SELECT role FROM users WHERE username = ?');
$stmt->execute([$_SESSION['username']]);
$user = $stmt->fetch();

if (!$user || $user['role'] !== 'admin') {
    die('Pro přístup na tuto stránku musíte být administrátorem.');;
    exit();
}

$db = (new Database())->getConnection();
$komentar_model = new komentare($db);
$komentare = $komentar_model->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domovská stránka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body style="background-color: #FFDFDE;">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6A7BA2;">
        <a class="navbar-brand" href="index.php" style="color: #FFDFDE; font-weight: bold;">
            <img src="../images/logo/logo-dlouhe-text.png" alt="Logo dlouhe" style="height: 40px;">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color: #FFDFDE; font-weight: bold;">Domů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galerie.php" style="color: #FFDFDE; font-weight: bold;">Prodej vozů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="databaze.php" style="color: #FFDFDE; font-weight: bold;">Inzerce vozů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php" style="color: #FFDFDE; font-weight: bold;">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFDFDE; font-weight: bold;">
                        <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Můj účet'; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php if (isset($_SESSION['username'])): ?>
                            <a class="dropdown-item" href="inzeraty_edit.php">Správa inzerátů</a>
                            <a class="dropdown-item" href="komentare_edit.php">Správa komentářů</a>
                            <a class="dropdown-item" href="../controllers/logout.php">Odhlásit se</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="prihlaseni.php">Přihlášení</a>
                            <a class="dropdown-item" href="registrace.php">Registrace</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
    
    <style>
        table.custom-table, table.custom-table th, table.custom-table td {
            border: 1px solid black;
            text-align: center;
        }

        table.custom-table {
            border-collapse: collapse;
            width: 100%;
        }

        table.custom-table thead {
            background-color: #6A7BA2;
            color: #FFF;
        }
    </style>

        <?php if (!empty($komentare)): ?>
            <table class="table custom-table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Uživatelské ID</th>
                        <th>Komentář</th>
                        <th>Datum a čas</th>
                        <th>Článek</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($komentare as $komentar): ?>
                        <tr>
                            <td><?= htmlspecialchars($komentar['id']) ?></td>
                            <td><?= htmlspecialchars($komentar['user_id']) ?></td>
                            <td><?= htmlspecialchars($komentar['comment']) ?></td>
                            <td><?= htmlspecialchars($komentar['created_at']) ?></td>
                            <td><?= htmlspecialchars($komentar['page_path']) ?></td>
                            <td>
                                <a href="edit_komentar.php?id=<?= $komentar['id'] ?>" class="btn btn-sm btn-primary">Upravit</a>
                                <a href="../controllers/smazat_komentar.php?id=<?= $komentar['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tento komentář?');">Smazat</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádne komentáře nebyly nalezeny.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>