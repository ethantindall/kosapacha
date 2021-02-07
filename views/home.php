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
        <span class="material-icons" onclick="showhide()">menu</span>
        <p>KOSA<b>PACHA</b></p>
        <span class="material-icons">shopping_bag</span>
    </header>

    <div class="sidebar hide">
            <?php echo $_SESSION['navbar'] ?>
    </div>



    <main>


        <picture>
            <source srcset="images/perularge.jpg" media="(min-width: 700px)"/>
            <img id="banner-img" src="images/perusmall.jpg" alt="Photo of Peru by Willian Justen de Vasconcellos on Unsplash">
        </picture>

        <div class="main-content">
            <h1>KOSAPACHA GROUP</h1>
            <hr>
            <p>What is Kosapacha Group? Well, we're a Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus cupiditate beatae delectus vero necessitatibus aperiam aliquid, itaque, assumenda culpa dignissimos debitis provident rerum totam sint harum exercitationem expedita, obcaecati sed?</p>
        
            <a href="#"><div class="card card1">
                <h2>SAMPLE PRODUCT</h2>
            </div></a>

            <a href="#"><div class="card card2">
                <h2>SAMPLE PRODUCT</h2>
            </div></a>

            <a href="#"><div class="card card3">
                <h2>SAMPLE PRODUCT</h2>
            </div></a>

        </div>


    </main>


    <footer>
        <hr>
        <p>KOSA<b>PACHA</b></p>
        <div class="foot-row-2">
            <a class="foot-item" href="#">Legal</a>
            <a class="foot-item" href="#">About Us</a>

            <span class="foot-item">&copy; 2020</span>
        </div>
    </footer>




<script src="script.js"></script>

</body>
</html>
