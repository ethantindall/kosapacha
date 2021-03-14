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

    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>
    <span class="material-icons" onclick="showhide()">menu</span>
        <p>KOSA<b>PACHA</b></p>
        <span class="material-icons">shopping_bag</span>    </header>


    <main>
        <h1>Kosapacha Timesheet Page</h1>
        <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 

        <?php echo 'User Id: ' . $_SESSION['selectedUserId'] . '<br>User Name: ' . $_SESSION['selectedUserFname'] . ' ' . $_SESSION['selectedUserLname']; ?>

<form method="post" action="/kosapacha/employee/index.php">   
    <h3>Select Existing Timesheet</h3>     
        <label>Week of:</label>
            <select type="date" name="weekOf" id="weekOf">
                <?php if(isset($dropdownOptions) && $dropdownOptions != "") {echo $dropdownOptions; } ?>
            </select>
            <button type="submit">Select Week</button>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="action" value="timesheet-page">
</form>
<form method="post" action="/kosapacha/employee/index.php">   
    <h3>Update Existing Timesheet</h3>     
        <table>
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
        <button type="submit">Save Time</button>
        <input type="hidden" name="action" value="save-time">
</form>
<form method="post" action="/kosapacha/employee/index.php">        
        <h3>Create New Timesheet</h3>
        <p>Please select the first day of the work week.</p>
        <label>Week of:</label>
            <input type="date" required name="calendarPicker">
            <input type="hidden" name="id" value="<?php echo $id;?>">

            <button type="submit">Create</button>
            <input type="hidden" name="action" value="new-timesheet">
</form>
    </main>



    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>

</body>
</html>
