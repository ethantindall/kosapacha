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
        <span class="material-icons" onclick="showhide()">menu</span>
        <p>KOSA<b>PACHA</b></p>
        <span class="material-icons">shopping_bag</span>
    </header>

    <div class="sidebar hide">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="accounts/index.php/?action=login-page">Log In</a></li>

            </ul>

        </div>



    <main>

        <img src="images/peru.jpg" alt="Photo of Peru by Willian Justen de Vasconcellos on Unsplash">
        <div class="main-content">
            <h1>KOSAPACHA GROUP LOGIN</h1>
            <hr>
            <form action="/kosapacha/accounts/" method="post">
            <label>Email</label><br>
            <input required type="email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> ><br>
            <label>Password</label><br>
            <span>(Must be at least 8 characters and have 1 uppercase letter number and special character.)</span><br>
            <input required type="password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <button type="submit">Sign In</button>
            <input type="hidden" name="action" value="Login">

        </form>
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
