<!DOCTYPE html>
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
        <?php require '../snippets/header.php'; ?>
    </header>

    <main>
        <h1>Edit User</h1>
        <?php if (isset($_SESSION['message'])) {echo '<p>' .$_SESSION['message'] . '</p>';} ?> 


        <form action="/employee/" method="post">
                <input type="hidden" name="oldUser" value="<?php if(isset($employeeDetails['employee_username'])){echo $employeeDetails['employee_username'];} ?>" >
                <input type="hidden" name="id" value="<?php if(isset($employeeDetails['employee_id'])){echo $employeeDetails['employee_id'];} ?>" >

                <label>First Name*</label><br>
                <input required type="text" name="fname" value="<?php if(isset($employeeDetails['employee_fname'])){echo $employeeDetails['employee_fname'];} ?>"><br>
                <label>Middle Name</label><br>
                <input type="text" name="mname" value="<?php if(isset($employeeDetails['employee_mname'])){echo $employeeDetails['employee_mname'];} ?>"><br>
                <label>Last Name*</label><br>
                <input required type="text" name="lname" value="<?php if(isset($employeeDetails['employee_lname'])){echo $employeeDetails['employee_lname'];} ?>"><br>

                <label>Username*</label><br>
                <input required type="text" name="username" value="<?php if(isset($employeeDetails['employee_username'])){echo $employeeDetails['employee_username'];} ?>"><br>
                <label>Password</label><br>
                <input type="password" name="password"><br>
                
                <label>Access Level*</label><br>
                <select name="access">
                    <option <?php if(isset($employeeDetails['employee_access']) && $employeeDetails['employee_access'] == '1') {echo 'selected="selected"';}?> value="1">1 - Basic User</option>
                    <option <?php if(isset($employeeDetails['employee_access']) && $employeeDetails['employee_access'] == '2') {echo 'selected="selected"';}?> value="2">2 - Supervisor</option>
                    <option <?php if(isset($employeeDetails['employee_access']) && $employeeDetails['employee_access'] == '3') {echo 'selected="selected"';}?> value="3">3 - Administrator</option>
                </select><br>
                <label>Employee Status*</label><br>
                <p>Inactive accounts cannot be logged into.</p>
                    <select name="status">
                        <option <?php if(isset($employeeDetails['employee_status']) && $employeeDetails['employee_status'] == 'ACTIVE') {echo 'selected="selected"';}?> value="ACTIVE">Active</option>
                        <option <?php if(isset($employeeDetails['employee_status']) && $employeeDetails['employee_status'] == 'INACTIVE') {echo 'selected="selected"';}?> value="INACTIVE">Inactive</option>
                    </select><br>
                <label>Employee Notes</label><br>
                    <textarea name="notes"><?php if(isset($employeeDetails['employee_notes'])){echo $employeeDetails['employee_notes'];} ?></textarea><br>

                <button type="submit">Update</button>
                <input type="hidden" name="action" value="updateUser">
            </form>

    </main>

    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>
</body>


</html>
