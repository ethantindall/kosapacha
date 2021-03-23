<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <script src="../script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

<header>

<?php require '../snippets/header.php'; ?>

</header>
    <main>
    <picture>
            <source srcset="" media="(min-width: 700px)"/>
            <img id="banner-img" src="" alt="">
        </picture>
        <div class="products">
        <?php if ($_SESSION['lang'] == 'es') {echo '
            <h1>Nuestros Productos</h1>';}
            else {'<h1>Our Products</h1>';} ?>

            <ul class="display-products">
                <?php echo $_SESSION['productTable']; ?>
            </ul>
        </div>
    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>

</body>
</html>
