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
        $_SESSION['title'] ="Kosapacha Timesheet";
        $weekOf = filter_input(INPUT_POST, 'weekOf', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $dailyhours = 0;

        $emp = getUserWOCreds($id);
        $_SESSION['selectedUserId'] = $emp['employee_id'];
        $_SESSION['selectedUserFname'] = $emp['employee_fname'];
        $_SESSION['selectedUserLname'] = $emp['employee_lname'];

        /*TO DO: Create a list of dates and sent it to the dropdown, then use the default one to find 
        if there's an existing row*/
        $timesheets = checkExistingTimesheet($_SESSION['selectedUserId']);

        $dropdownOptions= "";

        if (count($timesheets) > 0) {
            //sort the timesheets by date
            usort($timesheets, function($a, $b) {
                return strtotime($a['timesheet_week']) - strtotime($b['timesheet_week']);
            });        
            //select first one by default
            $dailyhours = $timesheets[0];


            foreach ($timesheets as $s) {
                $add = "";
                if ($s['timesheet_week'] == $weekOf) {
                    $dailyhours = $s;
                    //if selected day, set html to selected
                    $add = '<option selected value="' . $s['timesheet_week'] .'">' . $s['timesheet_week'] . '</option>';

                } else {
                    $add = '<option value="' . $s['timesheet_week'] .'">' . $s['timesheet_week'] . '</option>';
                }
                $dropdownOptions .= $add;
            }
        }
        else {
            $dropdownOptions .= '<option selected disabled value="">No Timesheets</option>';
        }

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
        //if no existing timesheet, set everything to 0
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
    case 'new-timesheet':
        $date = filter_input(INPUT_POST, 'calendarPicker', FILTER_SANITIZE_STRING);

        createNewTimesheet($date, $_SESSION['selectedUserId']);
        $_SESSION['title'] = 'Kosapacha Employee Landing Page';
        include '../views/employee-pages/employee.php';
        break;        break;
    case 'save-time':
        $weekOf = filter_input(INPUT_POST, 'week-of', FILTER_SANITIZE_URL);
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
    case 'admin':
        $_SESSION['title'] = 'Kosapacha Admin Page';
        $message = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
        $_SESSION['message'] = $message;
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
        
        //autofill details again
        $employeeDetails = adminGetOneUser($id)[0];

        //if the username is the same as another, not including the previous one
        if ($username != $oldUser) {
            $existingUsername = checkExistingUsername($username);
            if ($existingUsername == 1) {
                $_SESSION['message'] = 'This username already exists.';
                include '../views/employee-pages/editUser.php';
                exit;
            }
        }


        //update user info
        updateUser($id, $fname, $mname, $lname, $username, $status, $access, $notes);

        //if password is not null, and passes test
        if ($password != '' && checkPassword($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            updatePassword($id, $hashedPassword);
            header('Location: /employee/index.php/?action=admin&message=Update%20Successful');
            exit;
        }
        else if ($password == "") {
            header('Location: /employee/index.php/?action=admin&message=Update%20Successful');
            exit;     
        }
        else {
            $_SESSION['message'] = 'Invalid password.';
            include '../views/employee-pages/editUser.php';
            exit; 
        }

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

    case 'registration-page':
        $_SESSION['title'] = 'Kosapacha Registration Page';
        include '../views/employee-pages/register.php';
        break;
    case 'register':
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
        $existingUsername = checkExistingUsername($username);

        if ($existingUsername) {
            $_SESSION['message'] = 'This username already exists.';
            include '../views/employee-pages/register.php';
            exit;
        }
        if ($password == $password2 && checkPassword($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            createUser($fname, $mname, $lname, $username);
            storePassword($username, $hashedPassword);
        }
        else {
            $_SESSION['message'] = 'The password does not meet the criteria.';
            include '../views/employee-pages/register.php';
            exit;
        }
        $_SESSION['message'] = 'Account created.';
        header('Location: /employee/index.php/?action=admin&message=Account%20Added');
        break;
    case 'returnHome':
        $_SESSION['title'] = 'Kosapacha Employee Landing Page';
        include '../views/employee-pages/employee.php';
        break;
    default:
        include '../views/employee-pages/employee.php';
        break;
    }

?>