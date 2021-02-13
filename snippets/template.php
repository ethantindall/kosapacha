<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/small.css">
    <link rel="stylesheet" href="css/large.css">

    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>
    </header>


    <main>


    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>

</body>
</html>
