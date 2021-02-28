<?php
session_start();


require_once '../library/functions.php';
require_once '../library/connection.php';
require_once '../model/accounts-model.php';


/*if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $file = '/tmp/sample-app.log';
  $message = file_get_contents('php://input');
  file_put_contents($file, date('Y-m-d H:i:s') . " Received message: " . $message . "\n", FILE_APPEND);
}*/

// Create or access a Session


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
    case 'login-page':
        $_SESSION['title'] = 'Kosapacha Login Page';
        include '../views/login.php';
        break;
    case 'registration-page':
        $_SESSION['title'] = 'Kosapacha Registration Page';
        include '../views/register.php';
        break;
    case 'Login':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);



        $existingUsername = checkExistingUsername($username);
        $passwordCheck = checkPassword($password);


        if (empty($username) || empty($passwordCheck) || !$existingUsername) {
            $_SESSION['message'] = '<p class="notice">Your username or password is incorrect.</p>';
            include '../views/login.php';
            exit;
        }
        $userData = getUser($username);


        $hashCheck = password_verify($password, $userData['credential_password']);
        if(!$hashCheck) {
           $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
           include '../views/login.php';
           exit;
        }
        $_SESSION['loggedin'] = TRUE;
        array_pop($userData);
        $_SESSION['userData'] = $userData;
        $_SESSION['title'] = 'Kosapacha Employee Landing Page';
        include '../views/employee-pages/employee.php';
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
            include '../views/register.php';
            exit;
        }
        if ($password == $password2 && checkPassword($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            createUser($fname, $mname, $lname, $username);
            storePassword($username, $hashedPassword);
        }
        else {
            $_SESSION['message'] = 'The passwords do not match or the password does not meet the criteria.';
            include '../views/register.php';
            exit;
        }
        $_SESSION['message'] = 'Account created. Please sign in.';
        include '../views/login.php';
        break;
    case 'sign-out':
        //destroy session
        $_SESSION = array();
        session_destroy();
        header('Location: /');
        exit;   
    default:
        $_SESSION['title'] = 'Kosapacha Login Page';
        include '../views/login.php';
        break;
}
?>