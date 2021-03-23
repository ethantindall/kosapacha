<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <script src="script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
    <style>
    
    </style>
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
        <?php if (isset($_SESSION['message'])) {echo '<p class="message">' .$_SESSION['message'] . '</p>';} ?> 

        <div class="main-content">
            <?php if ($_SESSION['lang'] == 'es') {echo '
            <h1>GROUPO KOSAPACHA</h1>

            <hr>
            <p>¿Qué es el Grupo Kosapacha? Bueno, somos un Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus cupiditate beatae delectus vero necessitatibus aperiam aliquid, itaque, assumenda culpa dignissimos debitis provident rerum totam sint harum exercitationem expedita, obcaecati sed?</p>
        
            <a href="index.php/?action=kp-usa"><div class="card card1">
                <h2>Groupo Kosapacha EE.UU</h2>
            </div></a>

            <a href="index.php/?action=kp-sa"><div class="card card2">
                <h2>Kosapacha Holdings - Sudamerica</h2>
            </div></a>

            <a href="index.php/?action=kp-foundation"><div class="card card3">
                <h2>Fundación Kosapacha</h2>
            </div></a>
            '; }
        else { echo '
            <h1>KOSAPACHA GROUP</h1>

            <hr>
            <p>What is Kosapacha Group? Well, we\'re a Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus cupiditate beatae delectus vero necessitatibus aperiam aliquid, itaque, assumenda culpa dignissimos debitis provident rerum totam sint harum exercitationem expedita, obcaecati sed?</p>
        
            <a href="index.php/?action=kp-usa"><div class="card card1">
                <h2>Kosapacha Group USA</h2>
            </div></a>

            <a href="index.php/?action=kp-sa"><div class="card card2">
                <h2>Kosapacha Holdings - South America</h2>
            </div></a>

            <a href="index.php/?action=kp-foundation"><div class="card card3">
                <h2>Kosapacha Foundation</h2>
            </div></a>   
            ';} ?>
        </div>
    </main>
    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>
</body>
</html>
