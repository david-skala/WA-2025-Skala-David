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
    <img src="../images/subaru-brz-clanek3.jpg" alt="Obrázek článku 3" class="gallery-img">
    </div>

    <div class="blog-container">
    <header class="mb-4">
      <h1 class="text-center">Nové SUBARU BRZ s výrazně lepším výkonem</h1>
      <p class="text-center text-muted">Přidáno 6. 6. 2025</p>
    </header>

    <article>
        <p>Subaru mělo dobrý důvod, proč na trhu prodávalo výhradně vozy s pohonem všech 4 kol. Aby nějaký model tuto filozofii změnil, musel mít silný vzhled a jízdní vlastnosti, které by donutily automobilové nadšence postavit se do fronty. Tímto výjimečným vozem je nové kupé BRZ, které oficiálně dorazí v dubnu v sérii pouhých 10 identických kusů. Stejně jako testovací vůz na fotkách budou všechny v ikonické WR Blue barvě, se šestistupňovou manuální převodovkou a nejvyšší výbavou tS.</p>

        <p>Klíčem k atraktivitě tohoto vozu je právě manuální převodovka a atmosférický 2,4litrový plochý čtyřválec pohánějící zadní kola. Samozřejmostí je samosvorný diferenciál, ale oproti původnímu BRZ došlo k výrazným vylepšením. Výkon i točivý moment jsou podstatně vyšší než u předchozího dvoulitru, tuhost podvozku byla navýšena o 50 %, všechna zavěšení jsou výrazně tužší, přibyly brzdy Brembo a výsledná pohotovostní hmotnost 1280 kg vyvolá závist i u řidičů WRX.</p>

        <p>Recept tak slibuje zábavnou jízdu bez ohledu na délku cesty – a přesně taková byla naše zkušenost během nezapomenutelného týdne. Nové BRZ je rychlejší, obratnější, lépe ovladatelné a celkově dospělejší. Přitom si stále zachovává ohromnou dávku zábavy. Tentokrát má volně se vytáčející boxer od Subaru opravdu šťávu a při vyšších otáčkách dává o sobě výrazně vědět. A musíte ho vytáčet – motor ožívá od 4000 otáček, kdy už je k dispozici maximální točivý moment, a až do omezovače zbývá ještě 3500 ot./min. Ano, výkonu je víc, ale na správné silnici je celý dobře využitelný.</p>

        <p>Vyváženost zůstává doslova baletní. Jízdní stabilita v zatáčkách je působivá – nízké těžiště pomáhá BRZ ostře zatáčet a bezpečně projíždět zatáčky vysokou rychlostí bez protestu pneumatik Michelin Pilot 4. Jde o rozměrně nenáročné 215/40 na 18palcových kolech, ale nabízejí přesně tolik přilnavosti a klidu, kolik je třeba. Rychlý start z místa je snadný – spojka i řazení mají ideální odpor a dráhy řazení jsou dobře definované. Převodovka je lehce mechanická, což odpovídá lehce surovému charakteru vozu. Výrazné navýšení torzní tuhosti znamená, že STi-laděný podvozek nijak neomezuje komfort jízdy, který je na vůz této kategorie překvapivě dobrý. Jediná výtka se týká zvýšeného hluku od přední nápravy na hladkém asfaltu při nižších městských rychlostech.</p>

        <p>Vnější design je výraznější a lépe vyvážený než kdykoli předtím, s dobře zvolenými detaily. Tmavě šedá kola ladí s černými kryty zrcátek a kontrastují se zlatými třmeny brzd Brembo. Nápisy BRZ tS na přídi i víku kufru a červená loga BRZ v předních světlech podle nás mohly být decentnější.</p>

        <p>Uvnitř jsou sedadla posazena nízko (údajně o 5 mm níže než dříve, což zlepšuje výhled řidiče) a přední sedadla nabízejí velmi dobrou oporu a rozsah nastavení. Jsou čalouněna černým materiálem Ultrasuede s vínově červenými koženými akcenty. Do bočnic je vyraženo logo STI. V kabině je také STI červené tlačítko start/stop a exkluzivní přístrojový štít s dalšími vínovými detaily. Přestože jde o kupé 2+2, každodenní použitelnost zůstává dobrá – i když nás překvapilo plnohodnotné rezervní kolo v kufru, které zabírá dost místa, ale přináší větší klid při jízdě.</p>

        <p>Co se týče bezpečnosti, Subaru překonalo počáteční překážky a dokázalo do manuální verze BRZ integrovat systém EyeSight Driver Assist. Jeho přínos pro bezpečnost i komfort je nepopiratelný. Patří sem adaptivní tempomat, asistence pro udržování v jízdním pruhu, rozpoznání brzdových světel a přednárazové brzdění. Varování lze snadno vypnout a ostatní funkce jsou nenápadně kalibrovány tak, aby neobtěžovaly při sportovní jízdě. Hardware systému EyeSight je umístěn nahoře na čelním skle, po stranách zpětného zrcátka. Jediným náznakem dodatečné montáže je omezení pohybu sluneční clony.</p>

        <p>Celkově je nové BRZ mnohem komplexnějším vozem s podstatně vyšším výkonem. Co je ale nejdůležitější – stále si zachovává snadnou ovladatelnost a zábavnost. Jen málo aut vás tak silně vybízí k řízení a jen málo aut, bez ohledu na cenu, působí při sportovní jízdě tak intuitivně a vyváženě. Čistota jízdního zážitku dělá z BRZ budoucí klasiku a výborná výbava tento dojem jen potvrzuje.</p>

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