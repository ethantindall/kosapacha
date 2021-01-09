<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="../css/small.css">
    <link rel="stylesheet" media="screen" href="../css/large.css">

    <title><?php echo $_SESSION["title"] ?></title>

</head>
<body>
    <div id="wrapper"> 
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <main>
        <h1><?php echo $_SESSION["h1"]; ?></h1>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/footer.php'; ?>
    </footer>
    </div>
<script src="../js/main.js"></script>
</body>
</html>