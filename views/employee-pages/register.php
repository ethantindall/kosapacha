<?php
//redirect if not logged in
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] === FALSE) {
    header('Location: /');
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE && $_SESSION['userData']['employee_access'] < 3) {
    header('Location: /');  
}
?><!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/small.css">
    <link rel="stylesheet" href="/css/large.css">

    <title> <?php echo $_SESSION['title']; ?></title>
</head>
<body>

    <header>
        <?php require '../snippets/header.php'; ?>
        <a href="/employee/index.php?action=admin">Return to Admin Portal</a>

    </header>

    <main>
        <div class="main-content">
        <hr>

            <h1>KOSAPACHA GROUP Register</h1>
            <?php if (isset($_SESSION['message'])) {echo '<p>' . $_SESSION['message'] . '</p>';} ?> 

            <!--AWS: <form action="/accounts/" method="post"> -->
            <!--Localhost: <form action="/accounts/" method="post"> -->

            <form action="/employee/" method="post">
                <label>First Name*</label><br>
                <input required type="text" name="fname" <?php if(isset($fname)){echo "value='$fname'";}  ?> ><br>
                <label>Middle Name</label><br>
                <input type="text" name="mname" <?php if(isset($mname)){echo "value='$mname'";}  ?> ><br>
                <label>Last Name*</label><br>
                <input required type="text" name="lname" <?php if(isset($lname)){echo "value='$lname'";}  ?> ><br>

                <label>Username*</label><br>
                <input required type="text" name="username" <?php if(isset($username)){echo "value='$username'";}  ?> ><br>
                <label>Password*</label><br>
                <input required type="password" name="password"><br>
                
                <label>Reenter Password*</label><br>
                <input required type="password" name="password2"><br>    
                
                <button type="submit">Register</button>
                <input type="hidden" name="action" value="register">
            </form>
        </div>


    </main>


    <footer>
    <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
        </div>
    </footer>




<script src="script.js"></script>

</body>
</html>
