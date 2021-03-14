<!DOCTYPE html>
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
        <?php require '../snippets/header.php'; ?>
    </header>

    <main>
    <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 
    <a href="/kosapacha/employee/index.php/?action=registration-page">Register New User</a>

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
