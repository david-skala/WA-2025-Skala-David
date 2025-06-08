<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    // Uživatel není přihlášený, přesměrujeme na přihlášení
    header('Location: prihlaseni.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domovská stránka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card" style="border: 3px solid #6A7BA2; border-radius: 0;">
                <div class="card-header text-white text-center" style="background-color: #6A7BA2; border-radius: 0;">
                    <h3>VLOŽIT INZERÁT</h3>
                </div>
                <div class="card-body">
                    <form id="registrationForm" action="../controllers/inzeraty_controller.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="nazev_vozu" class="form-label">Název vozu</label>
                            <input type="text" id="nazev_vozu" name="nazev_vozu" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="rok_vyroby" class="form-label">Rok výroby</label>
                            <input type="number" id="rok_vyroby" name="rok_vyroby" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="najeto" class="form-label">Najeto (Km)</label>
                            <input type="number" id="najeto" name="najeto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="cena" class="form-label">Cena (Kč)</label>
                            <input type="number" id="cena" name="cena" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="kontakt" class="form-label">Kontakt (Telefon / E-mail)</label>
                            <input type="text" id="kontakt" name="kontakt" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Vložit inzerát</button>

                    </form>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>