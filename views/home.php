<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="/kosapacha/css/small.css">
    <link rel="stylesheet" media="screen" href="/kosapacha/css/large.css">


    <title><?php echo $_SESSION["title"] ?></title>

</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/header.php'; ?>
    </header>

    <div id="navbar"><b>KOSAPACHA GROUP</b></div>
    <div class="content"> 
    <main>
        <h1><?php echo $_SESSION["h1"]; ?></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis itaque dolore molestiae pariatur exercitationem dolor facilis, a cumque rem assumenda veritatis distinctio quas nisi delectus maiores possimus quis illum?</p>
        
        <h2><a href="index.php/?action=medical">Medical Products</a></h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur aspernatur sit enim ratione in molestias repellat? Molestiae incidunt, dolor recusandae quas obcaecati iste excepturi eius nemo expedita nam quidem sint!</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum molestiae natus, voluptas ipsam, quas dolor beatae quod perspiciatis doloremque dicta cumque nostrum modi illum optio. Doloribus fuga exercitationem illum fugiat?</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum molestiae natus, voluptas ipsam, quas dolor beatae quod perspiciatis doloremque dicta cumque nostrum modi illum optio. Doloribus fuga exercitationem illum fugiat?</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum molestiae natus, voluptas ipsam, quas dolor beatae quod perspiciatis doloremque dicta cumque nostrum modi illum optio. Doloribus fuga exercitationem illum fugiat?</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum molestiae natus, voluptas ipsam, quas dolor beatae quod perspiciatis doloremque dicta cumque nostrum modi illum optio. Doloribus fuga exercitationem illum fugiat?</p>

    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/kosapacha/snippets/footer.php'; ?>
    </footer>
    </div>
<script src="js/main.js"></script>
</body>
</html>