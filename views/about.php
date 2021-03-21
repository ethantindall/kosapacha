<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/kosapacha/css/styles.css">
    <link rel="stylesheet" href="/kosapacha/css/small.css">
    <script src="script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>
<header>
    <?php require 'snippets/header.php'; ?>
</header>
    <main>
        <picture>
            <source srcset="images/perularge.jpg" media="(min-width: 700px)"/>
            <img id="banner-img" src="images/perusmall.jpg" alt="Photo of Peru by Willian Justen de Vasconcellos on Unsplash">
        </picture>
        <div class="main-content">
            <h1>ABOUT KOSAPACHA</h1>
            <hr>
        <p>Who are we? Well, we're a really cool import export business. We do business in many countries
        all over the world. Maybe you've met us, or maybe someone pointed you our way. Either way, we're happy to see you here!
        </p>
        </div>
    </main>
    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>
</body>
</html>
