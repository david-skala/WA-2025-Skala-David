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

    <style>

    .image-wrapper {
    display: flex;
    justify-content: center;
    padding: 2rem 1rem;
    }

    .gallery-img {
    width: 100%;
    max-width: 1000px;
    height: auto;
    object-fit: cover;
    border: 3px solid #6A7BA2;
    cursor: default;
    display: block;
    }

    .blog-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 1rem;
    }

    header h1 {
    margin-top: 2rem;
    }

    article {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #333;
    }

    </style>

    <div class="image-wrapper">
    <img src="../images/skoda-clanek2.jpg" alt="Obrázek článku 2" class="gallery-img">
    </div>

    <div class="blog-container">
    <header class="mb-4">
      <h1 class="text-center">Eletrická ŠKODA ENYAQ 80</h1>
      <p class="text-center text-muted">Přidáno 5. 6. 2025</p>
    </header>

    <article>
        <p>Po týdnu a 500 svižně ujetých kilometrech v novém Enyaqu jsme si kladli otázku, co víc bychom vlastně mohli chtít od rodinného elektromobilu. Škoda nám poskytla luxusnější z dvojice počátečních výbav čistě elektrického Enyaqu. Obě nesou označení Sportline. Příplatek 5000 dolarů však přináší vrcholný model Sportline Max s adaptivním podvozkem (Dynamic Chassis Control), head-up displejem, 12reproduktorovým audiosystémem Canton a podsvícenou maskou chladiče ve stylu „crystal-face“. Testovaný vůz v barvě Race Blue byl navíc vybaven prosklenou střechou a 21palcovými disky kol Supernova, což zvýšilo cenu o dalších 4500 dolarů na výsledných 97 990 dolarů. (ceny jsou uvedeny v novozélandských dolarech)</p>

        <p>Jak napovídá název, výbava Sportline skutečně přináší sportovnější jízdní vlastnosti, i když 150 kW a 310 Nm nejsou na SUV této velikosti (4,65 m na délku) a hmotnosti (přes 2100 kg) nijak závratné hodnoty. Díky velmi brzkému nástupu výkonu + jeho hladkému a plynulému přenosu však Enyaq často působí svižněji, než by napovídal údaj 8,6 sekundy pro zrychlení z 0 na 100 km/h.</p>

        <p>Standardní sportovní podvozek a nízké těžiště zajišťují skvělou ovladatelnost a výborný přenos výkonu při jízdě do zatáčky. Varianta Sportline navíc využívá specifické pružiny a tlumiče a výška byla snížena o 10 až 15 mm oproti základním verzím, které se aktuálně prodávají v Evropě.</p>

        <p>Enyaq Sportline není jen pohotový a sportovně laděný vůz – zároveň je i velmi pohodlný a zábavný na řízení. Všechny ovládací prvky mají příjemnou a přesnou odezvu, a to zejména progresivní brzdy a řízení. Velikou hmotnost rodinného elektromobilu sice nelze zcela zamaskovat, ale Škodě se to daří velmi dobře.</p>

        <p>Převodovka nabízí klasický režim Drive i režim „B“ pro intenzivnější rekuperaci a brzdění. Úroveň rekuperace lze také manuálně nastavovat pomocí pádel pod volantem. Díky správnému využití rekuperace, plynulé akceleraci a rozumnému používání klimatizace jsme během našeho testování nemuseli vůz ani jednou dobíjet.</p>

        <p>Dalšími silnými stránkami jsou vynikající komfort sedadel a celkové uspořádání interiéru. Prostoru je překvapivě mnoho jak vpředu, tak vzadu, vzhledem k rozměrům vozu a také velmi bohatá standardní výbava včetně špičkových bezpečnostních systémů. Virtuální kokpit a 13palcový centrální dotykový displej výborně zvládají multimediální funkce.</p>

        <p>Enyaq Sportline je také vizuálně působivý vůz – s obrovskými koly, LED Matrix světlomety, ostře řezanými liniemi karoserie a množstvím lesklých černých detailů. Někdy je však méně více. Došli jsme také k závěru, že design zadní svislé části vozu působí méně elegantně než u některých konkurentů.</p>

        <p>A i když nelze popřít vysokou úroveň aktivní i pasivní bezpečnosti, která je mimořádně inovativní a komplexní, některé systémy mohou být až příliš rušící a narušovat jinak výborný zážitek z jízdy.</p>

        <p>Tak co víc bychom si mohli přát od rodinného elektromobilu? Možná přitažlivější název, méně zasahující asistenční systémy a nižší cenu. Pokud budeme mít štěstí, Škoda brzy nabídne Enyaq i za dostupnější cenu, a zpřístupní tak jeho silné stránky širšímu okruhu zákazníků.</p>

        <p><em>Zdroj: Převzato a přeloženo z kiwigarage.co.nz</em></p>

    </article>
    </div>

    <h2 style="background-color: #6A7BA2; color: white; padding: 10px; text-align: center; margin: 40px 0 0 0;">Komentáře</h2>

    <div class="comments-container" style="max-width: 600px; margin: 40px auto 0 auto; padding: 0 15px;">

        <?php

            if (!isset($_SESSION['user_id'])) {
                echo "<p>Pro přidání komentáře musíte být nejprve <a href='prihlaseni.php'>přihlášeni.</a></p>";
            } else {

        ?>

    <form method="POST" action="../controllers/vlozeni_komentare.php">
        <textarea name="comment" placeholder="Sem napište svůj komentář..." rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Vložit komentář</button>
    </form>

        <?php

            }

        ?>

    </div>

    <div class="comments-container2" style="max-width: 600px; margin: 40px auto 0 auto; padding: 0 15px;">

        <?php

            require_once '../models/database.php';
            $database = new Database();
            $conn = $database->getConnection();

            // Zjištění aktuální stránky
            $page_path = basename($_SERVER['SCRIPT_NAME']);

            $sql = "SELECT c.comment, c.created_at, u.username
                    FROM comments c
                    JOIN users u ON c.user_id = u.id
                    WHERE c.page_path = :page_path
                    ORDER BY c.created_at DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':page_path', $page_path, PDO::PARAM_STR);
            $stmt->execute();

            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($comments) {
                foreach ($comments as $row) {
                    echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong> (" . $row['created_at'] . ")<br>";
                    echo nl2br(htmlspecialchars($row['comment'])) . "</p><hr>";
                }
            } else {
                echo "<p>Zatím nejsou vloženy žádné komentáře.</p>";
            }

        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>