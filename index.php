<?php


// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }


    
switch ($action){
    case 'register-page':
        include 'views/registration.php';
        break;
    case 'medical':
        include 'views/medical-products.php';
        break;
    default:
        include 'views/home.php';
        break;
}
?>