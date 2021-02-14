<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/small.css">
    <link rel="stylesheet" href="../css/large.css">

    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>
        <?php require 'snippets/header.php'; ?>
    </header>

    <div class="sidebar hide">
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/nav-es.php';}
            else {require 'snippets/nav.php';} ?>
    </div>



    <main>


        <picture>
            <source srcset="../images/perularge.jpg" media="(min-width: 700px)"/>
            <img id="banner-img" src="../images/perusmall.jpg" alt="Photo of Peru by Willian Justen de Vasconcellos on Unsplash">
        </picture>

        <div class="main-content">
       
        </div>


    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>




<script src="script.js"></script>

</body>
</html>
