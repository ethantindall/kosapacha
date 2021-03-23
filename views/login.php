<?php
//redirect if not logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    header('Location: /employee');
}
?><!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <script src="/script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<style>
    .login-page {
        width: 800px;
        margin: 0 auto;
    }
    form button {
        background-color: #191919;
        font-size: 1.3rem;
        color: white;
        border: solid 3px white;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
    }
    form button:hover {
        background-color: white;
        color: #191919;
    }
</style>
<body>

    <header>

        <?php require '../snippets/header.php'; ?>
 
    </header>
    <main>
    <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];} ?> 

        <picture>
            <source srcset="" media="(min-width: 700px)"/>
            <img id="banner-img" src="" alt="">
        </picture>

        <div class="login-page">
        <hr>

            <h1>KOSAPACHA GROUP LOGIN</h1>
            <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 

            <!--AWS: <form action="/accounts/" method="post"> -->
            <!--Localhost: <form action="/accounts/" method="post"> -->

            <form action="/accounts/" method="post">
                <label>Username</label><br>
                <input required type="text" name="username" <?php if(isset($username)){echo "value='$username'";}  ?> ><br>
                <label>Password</label><br>
                <input required type="password" name="password"><br>
                <button type="submit">Sign In</button>
                <input type="hidden" name="action" value="Login">
            </form>
        </div>
    </main>
    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>
</html>
