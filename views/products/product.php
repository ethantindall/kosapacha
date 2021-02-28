<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/kosapacha/css/small.css">
    <link rel="stylesheet" href="/kosapacha/css/large.css">
    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/header.php'; ?>
    </header>


    <main>

        <?php echo $product; ?>
    </main>



    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/footer.php'; ?>
    </footer>

</body>
</html>
