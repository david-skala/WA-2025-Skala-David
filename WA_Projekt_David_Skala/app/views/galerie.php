<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

    <div class="container-fluid px-3 my-4">
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <img src="../images/honda-accord-2022.png" alt="auto" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Honda Accord 2022</h5>
                <p style="color: #000000; font-weight: bold;">od 680 750 Kč</p>
            </div>
            <div class="col-12 col-md-4">
                <img src="../images/dodge-charger-srt-hellcat-2019.png" alt="auto cislo 2" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Dodge Charger SRT Hellcat 2019</h5>
                <p style="color: #000000; font-weight: bold;">od 1 549 000 Kč</p>
            </div>
            <div class="col-12 col-md-4">
                <img src="../images/honda-civic-type-r-2025.png" alt="auto cislo 3" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Honda Civic Type R 2025</h5>
                <p style="color: #000000; font-weight: bold;">od 1 299 900 Kč</p>
            </div>
            <div class="col-12 col-md-4">
                <img src="../images/toyota-rav-2024.png" alt="auto cislo 4" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Toyota RAV4 2024</h5>
                <p style="color: #000000; font-weight: bold;">od 728 100 Kč</p>
            </div>
            <div class="col-12 col-md-4">
                <img src="../images/ford-f150-2023.png" alt="auto cislo 5" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Ford F150 2023</h5>
                <p style="color: #000000; font-weight: bold;">od 1 549 000 Kč</p>
            </div>
            <div class="col-12 col-md-4">
                <img src="../images/chevrolet-malibu-2021.png" alt="auto cislo 6" class="gallery-img" />
                <h5 class="mt-2" style="font-weight: bold;">Chevrolet Malibu 2021</h5>
                <p style="color: #000000; font-weight: bold;">od 207 500 Kč</p>
            </div>
        </div>
    </div>

    <footer>
        <img src="../images/logo/logo-dlouhe-text.png" alt="footer logo" />
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>