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
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <script src="/script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
    <style>
        main {
            padding-top: 50px;
            max-width: 450px;
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
        }
        tr {
            border-bottom: 1px solid gray;

        }
        td {
            padding: 10px;
        }
        .return {
            padding: 10px;
            border: 3px solid white;
            border-radius: 3px;
            background-color: #191919;
            color: white;

        }
        a {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <header>

        <?php require '../snippets/header.php'; ?>
 
    </header>

    <main>
        <h1>Kosapacha Employees</h1>
    <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 
    <a href="/employee/index.php/?action=registration-page">Register New User</a><br>
    <a href="/employee/index.php?action=returnHome">Return to Employee Home</a><br>


    <table>
        <tr>
            <th>Name</th>
            <th>Access Level</th>    
            <th>Status</th>
            <th></th>
        </tr>
        <?php echo $_SESSION['employeeList']; ?>
    </table>
    </main>

    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>


</html>
