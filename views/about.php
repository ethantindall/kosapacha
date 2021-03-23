<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <link rel="stylesheet" href="/css/about.css">

    <script src="script.js"></script>

    <title> <?php echo $_SESSION['title'] ?></title>
   
</head>
<body>
<header>
    <?php require 'snippets/header.php'; ?>
</header>
    <main>
        <div class="main-content">
        <?php if ($_SESSION['lang'] == 'es') {echo '
                    <div class="span-cols">
                        <h1>SOBRE KOSAPACHA</h1>
                        <hr>
                        <p>¿Quienes somos? Bueno, somos un negocio de importación y exportación realmente genial. Hacemos negocios en muchos países.
                        por todo el mundo. Tal vez nos conozca, o tal vez alguien le indicó nuestro camino. De cualquier manera, ¡estamos felices de verte aquí!</p>
                        </div>
                    <div class="block r1-left">
                        <h2>PETER SWANSON</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>

                    </div>
                    <div class="block r1-right">
                        <img src="https://via.placeholder.com/150/150">
                    </div>
                    <div class="block r2-right">
                        <h2>NOMBRE DEL SOCIO</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>
                    </div>
                    <div class="block r2-left">
                        <img src="https://via.placeholder.com/150/150">
                    </div>
                    <div class="block r3-left">
                    <h2>NOMBRE DEL SOCIO</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>
                    </div>
                    <div class="block r3-right">
                        <img src="https://via.placeholder.com/150/150">
                    </div>'
;}
        else { echo'
            <div class="span-cols">
            <h1>ABOUT KOSAPACHA</h1>
            <hr>
            <p>Who are we? Well, we\'re a really cool import export business. We do business in many countries
            all over the world. Maybe you\'ve met us, or maybe someone pointed you our way. Either way, we\'re happy to see you here!</p>
        </div>
        <div class="block r1-left">
            <h2>PETER SWANSON</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>

        </div>
        <div class="block r1-right">
            <img src="https://via.placeholder.com/150/150">
        </div>
        <div class="block r2-right">
            <h2>PARTNER NAME</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>
        </div>
        <div class="block r2-left">
            <img src="https://via.placeholder.com/150/150">
        </div>
        <div class="block r3-left">
        <h2>PARTNER NAME</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsa aliquid, saepe eaque esse quidem dolor impedit dolorem cumque suscipit, placeat aperiam non sequi commodi inventore possimus? Dolorem, iure nostrum.</p>
        </div>
        <div class="block r3-right">
            <img src="https://via.placeholder.com/150/150">
        </div>'
        ;} ?>
        </div>
    </main>
    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require 'snippets/es/footer-es.php';}
            else {require 'snippets/footer.php';} ?>
    </footer>
</body>
</html>
