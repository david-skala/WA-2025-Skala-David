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
    <img src="../images/clanek1-nahled.jpg" alt="Obrázek článku 1" class="gallery-img">
    </div>

    <div class="blog-container">
    <header class="mb-4">
      <h1 class="text-center">Zcela nový Ford Expedition 2025 vs. Chevy Suburban</h1>
      <p class="text-center text-muted">Přidáno 5. 6. 2025</p>
    </header>

    <article>
        <p>Ford Expedition byl vždy z hlediska prodejů a obliby až za Chevroletem Suburban. Jak ale konkurence pro Ford sílí, přichází s novým modelem. Ford Expedition byl poprvé představen roku 1997 a od té doby si dokázal vybudovat věrnou základnu fanoušků. Během následujících 30 let Ford s identitou Expeditionu různě experimentoval a nakonec jej učinil velmi konkurenceschopným. Chevrolet Suburban má své kořeny už v polovině 30. let 20. století a patří k nejúspěšnějším vozidlům, jaké kdy tato americká firma vyrobila. Nyní vstupuje do své 12. generace a i když je stále populární, konkurence je stále větší a větší.</p>

        <p>Ford a Chevrolet zastávají rozdílné filozofie, ať už jde o motor, konfiguraci, či výkon.
        V tomto srovnání uvidíme, jak tyto rozdíly vypadají v praxi. Je vždy zajímavé sledovat, jak odlišná mohou být dvě vozidla, která mají společné zadání: být praktickými SUV postavenými na bázi nákladního vozu. Zvládnou tahání, převoz velkého množství nákladu a nabídnou i pohodlí celé rodině, a to vše v robustním balení. To není snadný úkol.</p>

        <p>Pokud zvolíte naftovou verzi, můžete dosáhnout spotřeby 21 mpg ve městě
        (míle na gallon, jestli jste to dočetl až sem, tak se mi to nechce přepočítávat na l/km, pardon) a 27 mpg (dálnice) s pohonem zadních kol, nebo o 1 mpg méně při pohonu všech kol (4×4). Celkový dojezd tak může přesáhnout 700 mil (něco přes 1000km). Základní benzínový motor 5,3 litru V8 nabízí spotřebu 15 mpg ve městě a 20 mpg na dálnici, s 4×4 pak klesne dálniční spotřeba o 2 mpg. Výkonnější motor 6,2 litru V8 má spotřebu 14 mpg ve městě a 19 mpg na dálnici, opět s 1 mpg ztrátou na dálnici při pohonu všech kol. Všechny Suburbany mají 10stupňovou automatickou převodovku.</p>

        <p>Chevrolet Suburban 2025 je k dispozici v šesti výbavách: LS, LT, RST, Premier, High Country a Z71 (pouze s pohonem 4x4). Nejvyšší a nejluxusnější verze je High Country 6.2 4×4, která začíná těsně pod hranicí 87 000 dolarů. Bez ohledu na výbavu získáte modernizovaný interiér, 11palcový digitální přístrojový štít a obrovský 17,7palcový dotykový info displej. Prvky jako pohon 4x4, vzduchové odpružení a další vylepšení interiéru jsou buď specifické pro danou výbavu, nebo za příplatek.</p>

        <p>Suburban dokáže táhnout náklad o hmotnosti mezi 7 400 a 8 000 liber, v závislosti na zvolené motorizaci a výbavě. Jak už bylo řečeno, Chevrolet Suburban 2025 lze vybavit mnoha způsoby. Ford, Jeep, Toyota ani Nissan se co do variability konfigurací tomuto velkému rodinnému vozu od GM nevyrovnají. Díky vylepšenému interiéru, novým off-road balíčkům a třem výkonným pohonným jednotkám je Suburban skutečně těžkým soupeřem. Přesto má Ford zajímavou odpověď.</p>

        <p>Expedition se vyrábí ve dvou velikostech: standardní verze, která se velikostně rovná modelu Tahoe, a Expedition MAX, který soutěží přímo se Suburbanem. Základní model Ford Expedition 2025 začíná na ceně 62 000 dolarů. Verze MAX a pohon 4WD přidávají každá po 3 000 dolarech, pokud ovšem nezvolíte verzi Tremor, která má 4WD v základní výbavě. Vnitřní prostor Expeditionu dosahuje maximálně 144,5 krychlových stop, zatímco Expedition MAX nabídne maximálně 123,1 krychlových stop nákladového prostoru. Prostor pro cestující je u obou vozů podobný, ale Suburban je o něco větší a asi o 4 palce delší.</p>

        <p><em>Zdroj: Převzato a přeloženo z autoblog.com</em></p>

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