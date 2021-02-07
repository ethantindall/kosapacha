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


switch ($action){
    case 'login-page':
        $_SESSION['title'] = 'Kosapacha Login Page';
        include '../views/login.php';
        break;
    case 'registration-page':
        $_SESSION['title'] = 'Kosapacha Registration Page';
        include '../views/register.php';
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


        $hashCheck = password_verify($password, $userData['employee_password']);
        if(!$hashCheck) {
           $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
           include '../views/login.php';
           exit;
        }

        $_SESSION['title'] = 'Kosapacha Employee Landing Page';
        include '../views/employee.php';
        break;
    default:
        $_SESSION['title'] = 'Kosapacha Login Page';
        include '../views/login.php';
        break;
}
?>