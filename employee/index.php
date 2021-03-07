<?php
session_start();

require_once '../library/functions.php';
require_once '../library/connection.php';
require_once '../model/employee-model.php';
require_once '../model/accounts-model.php';



$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }


 $_SESSION['message'] = '';

/*---------LANGUAGE CONTROL------------*/

if (isset($_COOKIE['preferred-language'])) {
    $_SESSION['lang'] = $_COOKIE['preferred-language'];
} else {
    $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    setcookie('preferred-language', $_SESSION['lang'], time() + (86400 * 90));
}


/*----------SWITCH STATEMENT-------------*/

switch ($action){
    case 'timesheet-page':
        /*TO DO: Create a list of dates and sent it to the dropdown, then use the default one to find 
        if there's an existing row*/
        $week ='2021-02-20';

        $_SESSION['title'] ="Kosapacha Timesheet";

        if ($_SESSION['lang'] == 'es') {
            $tableHead = '<th>Lunes</th>
                          <th>Martes</th>
                          <th>Miércoles</th>
                          <th>Jueves</th>
                          <th>Viernes</th>
                          <th>Sábado</th>
                          <th>Domingo</th>';
        }
        else {
            $tableHead = '<th>Monday</th>
                          <th>Tuesday</th>
                          <th>Wednesday</th>
                          <th>Thursday</th>
                          <th>Friday</th>
                          <th>Saturday</th>
                          <th>Sunday</th>';
        }

        $dailyhours = checkExistingTimesheet($_SESSION['userData']['employee_id'], $week);
        if($dailyhours == 0) {
            $monHours   = 0;
            $tuesHours  = 0;
            $wedHours   = 0;
            $thursHours = 0;
            $friHours   = 0;
            $satHours   = 0;
            $sunHours   = 0;
        } else {
            $monHours   = $dailyhours['mon_time'];
            $tuesHours  = $dailyhours['tues_time'];
            $wedHours   = $dailyhours['wed_time'];
            $thursHours = $dailyhours['thurs_time'];
            $friHours   = $dailyhours['fri_time'];
            $satHours   = $dailyhours['sat_time'];
            $sunHours   = $dailyhours['sun_time'];
        }

        include '../views/employee-pages/timesheet.php';
        break;
    case 'save-time':
        $weekOf = filter_input(INPUT_POST, 'week-of', FILTER_SANITIZE_STRING);
        $mon = filter_input(INPUT_POST, 'mon', FILTER_SANITIZE_NUMBER_FLOAT);
        $tues = filter_input(INPUT_POST, 'tues', FILTER_SANITIZE_NUMBER_FLOAT);
        $wed = filter_input(INPUT_POST, 'wed', FILTER_SANITIZE_NUMBER_FLOAT);
        $thurs = filter_input(INPUT_POST, 'thurs', FILTER_SANITIZE_NUMBER_FLOAT);
        $fri = filter_input(INPUT_POST, 'fri', FILTER_SANITIZE_NUMBER_FLOAT);
        $sat = filter_input(INPUT_POST, 'sat', FILTER_SANITIZE_NUMBER_FLOAT);
        $sun = filter_input(INPUT_POST, 'sun', FILTER_SANITIZE_NUMBER_FLOAT);
        
        saveTime($_SESSION['userData']['employee_id'], $weekOf, $mon, $tues, $wed, $thurs, $fri, $sat, $sun);
        

        $_SESSION['message'] = 'Timesheet saved.';
        include '../views/employee-pages/employee.php';
        break;   
    case 'update-password':
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

        if ($password == $password2 && checkPassword($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            updatePassword($_SESSION['userData']['employee_id'], $hashedPassword);
        }
        else {
            $_SESSION['message'] = 'The passwords do not match or the password does not meet the criteria.';
            include '../views/employee-pages/employee.php';
            exit;
        }
        $_SESSION['message'] = 'Password updated.';
        include '../views/employee-pages/employee.php';
        break;   
    case 'admin':
        $_SESSION['title'] = 'Kosapacha Admin Page';
        $_SESSION['employeeList'] = usersTable();
        include '../views/employee-pages/admin.php';
        break; 
    case 'editUserPage':
        $userId = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_NUMBER_INT);
        $employeeDetails = adminGetOneUser($userId)[0];
        include '../views/employee-pages/editUser.php';
        break;        
    case 'updateUser':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $oldUser = filter_input(INPUT_POST, 'oldUser', FILTER_SANITIZE_STRING);
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $access = filter_input(INPUT_POST, 'access', FILTER_SANITIZE_NUMBER_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);

        //if the username is the same as another, not including the previous one
        if ($username != $oldUser) {
            $existingUsername = checkExistingUsername($username);
        }
        if ($existingUsername) {
            $_SESSION['message'] = 'This username already exists.';
            header('Location: /employee/index.php/?action=editUserPage&user=' . $id);
            exit;
        }

        //update user info
        updateUser($id, $fname, $mname, $lname, $username, $status, $access, $notes);

        //if password is not null, and passes test
        if ($password != '' && checkPassword($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            updatePassword($id, $hashedPassword);
        }

        $_SESSION['message'] = 'Account updated.';
        header('Location: /employee/index.php/?action=admin');
        break;
    default:
        include '../views/employee-pages/employee.php';
        break;
    }

?>