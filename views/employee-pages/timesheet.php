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

<form method="post" action="/employee/index.php">        
        <label>Week of:</label>
            <select name="week-of" id="week-of">
                <option value="2021-01-04">4 Jan 2021</option>
                <option value="2021-01-11">11 Jan 2021</option>
                <option value="2021-01-18">18 Jan 2021</option>
                <option value="2021-01-25">25 Jan 2021</option>
                <option value="2021-02-01">01 Feb 2021</option>
                <option value="2021-02-08">08 Feb 2021</option>
                <option value="2021-02-15">15 Feb 2021</option>
                <option value="2021-02-22">22 Feb 2021</option>
                <option value="2021-03-01">01 Mar 2021</option>

            
            </select>
        <table>
            <tr>
                <?php echo $tableHead ?>
            </tr>
            <tr>
                <td><input type="number" value="<?php if(isset($monHours))  {echo $monHours;  } ?>" name="mon" id="mon" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($tuesHours)) {echo $tuesHours; } ?>" name="tues" id="tues" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($wedHours))  {echo $wedHours;  } ?>" name="wed" id="wed" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($thursHours)){echo $thursHours;}  ?>" name="thurs" id="thurs" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($friHours))  {echo $friHours;  } ?>" name="fri" id="fri" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($satHours))  {echo $satHours;  } ?>" name="sat" id="sat" min="0" max="24" step="0.25"></td>
                <td><input type="number" value="<?php if(isset($sunHours))  {echo $sunHours;  } ?>" name="sun" id="sun" min="0" max="24" step="0.25"></td>
            </tr>
        </table>
        <button type="submit">Save Time</button>
        <input type="hidden" name="action" value="save-time">
</form>
    </main>



    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>
</html>
