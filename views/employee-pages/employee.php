<?php
//redirect if not logged in
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] === FALSE) {
    header('Location: /');
}
?><!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <link rel="stylesheet" href="/css/employee.css">

    <style>
        .buttons li {
            text-decoration: underline;
        }
        .buttons button {
            text-decoration: underline;
        }
        .employee{
            max-width: 800px;
            margin: 40px auto;
        }
    </style>
    <script src="/script.js"></script>

    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>

        <?php require '../snippets/header.php'; ?>
 
    </header>
    <main>
        <div class="employee">
        <div class="col1">
        <h1>Kosapacha Employee Page</h1>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
            echo '<p>Welcome, ' . $_SESSION['userData']['employee_fname'] . '. You are signed in.</p>';
        }
        ?>
        <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];} ?> 
        <ul>
            <li>Name: <?php echo $_SESSION['userData']['employee_fname'] . ' ' . $_SESSION['userData']['employee_lname']; ?></li>
            <li>Username: <?php echo $_SESSION['userData']['employee_username']; ?></li>
            <li>Employee ID: <?php echo $_SESSION['userData']['employee_id']; ?></li>
            <li>Max Weekly Hours: <?php echo $_SESSION['userData']['employee_max_hours'] ?></li>
            <!--<li>Current Weekly Hours: 0</li>-->
            <li>Employee Access Level: <?php echo $_SESSION['userData']['employee_access'] ?></li>
        </ul>
        <div class="buttons">
                <ul>
                    <?php if($_SESSION['userData']['employee_access'] >= 3) {
                        echo '<li><a href="/employee/index.php/?action=admin">Administration</a><li>';
                        }
                    ?>
                    <li>
                        <form action="/employee/" method="post">
                        <button type="submit">Timesheet</button>
                        <input type="hidden" name="id" value=<?php echo $_SESSION['userData']['employee_id']; ?>>
                        <input type="hidden" name="action" value="timesheet-page">
                        </form>
                    <li>
                    <li><a href="/accounts/index.php/?action=sign-out">Sign Out</a></li>
                </ul>
          </div>

    </div>
        <div class="col2">
        <form action="/employee/" method="post">
                <h2>Change Your Password:</h2>
                <label>Password</label><br>
                <input required type="password" name="password"><br>
                <label>Reenter Password</label><br>
                <input required type="password" name="password2"><br>    
                
                <input type="submit" value="Change Password">
                <input type="hidden" name="action" value="update-password">
            </form>

    </div>
        </div>
    </main>



    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>
</html>
