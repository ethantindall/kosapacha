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
    <script src="/script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
    <style>
        main {
            padding: 70px 20px 20px 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .return {
            padding: 10px;
            margin: 10px 10px 10px 0;
            border: 3px solid white;
            border-radius: 3px;
            background-color: #191919;
            color: white;
            font-family: 'Overpass', sans-serif;
            font-size: 1rem;
        }
        article {
            border: solid 1px white;
            padding: 10px;
            margin: 20px;
            border-radius: 10px;
        }
        .return:hover {
            background-color: white;
            color: #191919;
        }
        h3 {
            padding-top: 30px;
            font-size: 1.5rem;
        }

    </style>
</head>
<body>

    <header>

        <?php require '../snippets/header.php'; ?>
 
    </header>
    <main>
        <h1>Kosapacha Timesheet Page</h1>
        <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 
        <a class="return" href="/employee/index.php?action=employee">Return to Employee Portal</a>

        <?php echo '<br><br><p>User Id: ' . $_SESSION['selectedUserId'] . '</p><p>User Name: ' . $_SESSION['selectedUserFname'] . ' ' . $_SESSION['selectedUserLname'] . '</p>'; ?>

        <article>
<form method="post" action="/employee/index.php">   
    <h3>Select Existing Timesheet</h3>   
        <label>Week of:</label>
            <select required type="date" name="weekOf" id="weekOf">
                <?php if(isset($dropdownOptions) && $dropdownOptions != "") {echo $dropdownOptions; } ?>
            </select>
            <button class="return" type="submit">Select Week</button><br>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="action" value="timesheet-page">
</form>
        </article>
        <article>
<form method="post" action="/employee/index.php">   
 
    <h3>Update Existing Timesheet</h3>   
        <table>
        <?php echo $weekOf; ?>

            <tr>
                <?php echo $tableHead ?>
            </tr>
            <tr>
                <td><input type="number" min="0" value="<?php if(isset($monHours))  {echo $monHours;  } ?>" name="mon" id="mon" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($tuesHours)) {echo $tuesHours; } ?>" name="tues" id="tues" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($wedHours))  {echo $wedHours;  } ?>" name="wed" id="wed" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($thursHours)){echo $thursHours;}  ?>" name="thurs" id="thurs" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($friHours))  {echo $friHours;  } ?>" name="fri" id="fri" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($satHours))  {echo $satHours;  } ?>" name="sat" id="sat" min="0" max="24" step="0.25"></td>
                <td><input type="number" min="0" value="<?php if(isset($sunHours))  {echo $sunHours;  } ?>" name="sun" id="sun" min="0" max="24" step="0.25"></td>
            </tr>
        </table>
        <button type="submit" class="return">Save Time</button>
        <input type="hidden" name="week-of" value="<?php echo $weekOf; ?>">
        <input type="hidden" name="action" value="save-time">
</form>
    </article>
    <article>
<form method="post" action="/employee/index.php">    
     
        <h3>Create New Timesheet</h3>
        <p>Please select the first day of the work week.</p>
        <label>Week of:</label>
            <input required type="date" required name="calendarPicker">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            
            <button type="submit" class="return">Create</button>
            <input type="hidden" name="action" value="new-timesheet">
</form>
    </article>
    </main>



    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>

</body>
</html>
