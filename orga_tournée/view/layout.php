<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="../view/style.css" rel="stylesheet" />
    <script src="view/script.js"></script>
</head>

<body>
    <header>
        <nav>
            <h1 class="companyname">Virtuose</h1>
            <ul>
                <li><a href="/index.php?action=accueil">Accueil</a></li>
                <li><a href="/index.php?action=adminRedirection">Espace interne</a></li>
            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer>
        <a class="a-nostyle white-font">Conditions générales de vente</a>
        <a class="a-nostyle white-font">Conditions générales d'utilisation</a>
        <a class="a-nostyle white-font">Politique en matière de cookies</a>
    </footer>
</body>

</html>