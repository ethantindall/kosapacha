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
        <?php if (isset($_SESSION['message'])) {echo '<p class="message">' .$_SESSION['message'] . '</p>';} ?> 

        <div class="main-content">
            <form class="contact" method="post" action="/kosapacha/index.php">
                <h1>Contact us</h1>
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
</body>
</html>
