<?php
//redirect if not logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === FALSE) {
    header('Location: /');
}
?><!DOCTYPE html>
<html lang="en-US">
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
    <span class="material-icons" onclick="showhide()">menu</span>
        <p>KOSA<b>PACHA</b></p>


    <main>
        <h1>Kosapacha Employee Page</h1>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
            echo '<p>Welcome, ' . $_SESSION['userData']['employee_fname'] . '. You are signed in.</p>';
        }
        ?>
        <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];} ?> 
        <ul>
            <li>Name: <?php echo $_SESSION['userData']['employee_fname'] . ' ' . $_SESSION['userData']['employee_lname']; ?></li>
            <li>Employee ID: <?php echo $_SESSION['userData']['employee_id']; ?></li>
            <li>Max Weekly Hours: <?php echo $_SESSION['userData']['employee_max_hours'] ?></li>
            <li>Current Weekly Hours: 0</li> 
        </ul>


        <form action="/employee/" method="post">

                <label>Password</label><br>
                <input required type="password" name="password"><br>
                <label>Reenter Password</label><br>
                <input required type="password" name="password2"><br>    
                
                <button type="submit">Change Password</button>
                <input type="hidden" name="action" value="update-password">
            </form>


        <a href="/employee/index.php/?action=timesheet-page">Timesheet</a><br>
        <a href="/accounts/index.php/?action=sign-out">Sign Out</a>

    </main>



    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>
</html>