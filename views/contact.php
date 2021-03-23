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
        input[type="submit"] {
    background-color: #191919;
    color: white;
    border: solid 3px white;
    padding: 10px 15px 9px 15px;
    font-family: 'Overpass', sans-serif;
    font-size: 1.5rem;
    margin-top: 20px;
    margin-left: 15px;
    border-radius: 5px;
}
input[type="submit"]:hover {
    background-color: white;
    color: #191919;
}
.main-content {
    width: 900px;
    margin: 0 auto;
}
    </style>
</head>
<body>

<header>

<?php require 'snippets/header.php'; ?>

</header>


    <main>

    <picture>
            <source srcset="images/contactlarge.jpg" media="(min-width: 700px)"/>
            <img id="banner-img" src="images/contactsmall.jpg" alt="Photo of Loading Tech by Joseph Frank on Unsplash">
        </picture>
        <?php if (isset($_SESSION['message'])) {echo '<p class="message">' .$_SESSION['message'] . '</p>';} ?> 
        <?php if ($_SESSION['lang'] == 'es') {echo '
                <div class="main-content">
                <h1>Contacta con nosotros</h1>

                <!--<form class="contact" method="post" action="/index.php">
                        <label>Nombre:</label>
                            <input required name="contactName" type="text"><br>
                        <label>Correo Electrónico:</label>
                            <input required type="email" name="contactEmail"><br>
                        <label>Mensaje:</label>  
                            <textarea required name="contactMessage"></textarea> <br>
                        <input type="submit" value="Enviar">
                        <input type="hidden" name="action" value="send-message">

                    </form>-->
                    <form action="mailto:contact@kosapachagroup.com?subject=Kosapacha" enctype="text/plain" method="GET">
                    <p>Puede comunicarse con nosotros haciendo clic en el enlace a continuación o enviándonos un correo electrónico a preguntas@kosapacha.com.</p>
                    <input name="subject" type="hidden" value="Kosapacha" />
                    <input type="submit" value="Contacta con nosotros" />
                </form>
                </div>';}
        else { echo
            '<div class="main-content">
            <h1>Contact us</h1>

            <!--<form class="contact" action="">
                <label>Name:</label>
                    <input required name="contactName" type="text"><br>
                <label>Email Address:</label>
                    <input required type="email" name="contactEmail"><br>
                <label>Message:</label>  
                    <textarea required name="contactMessage"></textarea> <br>
                <input type="submit" value="Send">
                <input type="hidden" name="action" value="send-message">

            </form>-->
            <form action="mailto:contact@kosapachagroup.com?subject=Kosapacha" enctype="text/plain" method="GET">
            <p>You can reach us by clicking the link below, or by emailing us at: questions@kosapacha.com.</p>
            <input name="subject" type="hidden" value="Kosapacha" />
            <input type="submit" value="Send" />
        </form>'
        ;} ?>


    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>
</body>
</html>
