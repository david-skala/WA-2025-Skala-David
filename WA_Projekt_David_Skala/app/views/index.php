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

    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
        <img src="../images/logo/hlavni-logo-transparentni.png" alt="DASK LOGO" style="max-width: 800px; width: 100%; height: auto;">
    </div>
    
    <div class="d-flex justify-content-center align-items-start" style="height: 100vh; margin: 0; padding-top: 50px;">
        <div class="card w-100" style="background-color: #FFDFDE; overflow: hidden; border-radius: 0;">
            <div class="row g-0" style="height: 600px;">
                <div class="col-12 col-md-6 h-100">
                    <div class="h-100 w-100">
                        <img src="../images/autobazar-hlavni-stranka.jpg" alt="Autobazar" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex h-100">
                    <div class="card-body d-flex flex-column justify-content-center w-100" style="color: #6A7BA2; border-radius: 0;">
                        <h5 class="card-title">Vítejte!</h5> <br>
                        <p class="card-text">
                            Vítejte na webových stánkách autobazaru DASK, založeného v roce 2025. Naším cílem je poskytnout našim zákazníkům a uživatelům široký výběr kvalitních vozů. Na našich stránkách můžeté nalézt jak ojeté tak i nové vozy za férové ceny, které odpovídají jejich stavu. U nás dbáme na pečlivou kontrolu každého vozu.
                        <br> <br>
                            Pokud nevíte jaký vůz si vybrat, navštivte náš blog. Na našem blogu najdete mnoho užitečných rad i recenzí, které Vám pomohou s výběrem Vašeho nového idealního vozu přesně podle vašich představ a potřeb. Na našem blogu najdete také novinky ze světa automobilů i informace o aktuálních trendech v tomto odvětví.
                        </p>
                    </div>
                </div>
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