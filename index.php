<?php

echo "one";
// Create or access a Session
session_start();

echo "two";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

echo "three";    
switch ($action){
    case 'register-page':
        echo "four";
        include 'views/registration.php';
        break;
    case 'medical':
        echo "five";
        include 'views/medical-products.php';
        break;
    default:
        include 'views/home.php';
        echo "meow";
        break;
}

?>
