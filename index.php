<?php

echo "hi";
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
        $_SESSION["title"] = "Kosapacha Group Medical Page";
        $_SESSION["h1"] = "Medical products";
        include 'views/medical-products.php';
        break;
    default:
        $_SESSION["title"] = "Kosapacha Group Home Page";
        $_SESSION["h1"] = "Kosapacha Group";
        include '/views/home.php';
        break;
}