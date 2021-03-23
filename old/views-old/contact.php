<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
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
        <?php require 'snippets/header.php'; ?>
    </header>




    <main>
    <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];} ?> 

        <div class="main-content">
        <form method="post" action="/index.php">
            <h2>Contact us</h2>
            <label>Name:</label>
                <input required name="contactName" type="text"><br>
            <label>Email Address:</label>
                <input required type="email" name="contactEmail"><br>
            <label>Message:</label>  
                <textarea required name="contactMessage"></textarea> <br>
            <input type="submit" value="Send">
            <input type="hidden" name="action" value="send-message">

        </form>

        </div>


    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>




<script src="script.js"></script>

</body>
</html>
