<?php

require 'library/connection.php';
require 'library/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $file = 'tmp/sample-app.log';
  $message = file_get_contents('php://input');
  file_put_contents($file, date('Y-m-d H:i:s') . " Received message: " . $message . "\n", FILE_APPEND);
}

// Create or access a Session
session_start();
$_SESSION['message'] = "";

/*---------LANGUAGE CONTROL------------*/

if (isset($_COOKIE['preferred-language'])) {
    $_SESSION['lang'] = $_COOKIE['preferred-language'];
} else {
    $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    setcookie('preferred-language', $_SESSION['lang'], time() + (86400 * 90));
}


/*----------SWITCH STATEMENT-------------*/

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

if ($_SESSION['lang'] == 'es') {
     switch ($action){
        case 'medical':
            $_SESSION['title'] = 'Kosapacha Medical Products';
            include 'views/product.php';
            break;
        case 'kp-usa':
            $_SESSION['title'] = 'Kosapacha Estados Unidios';
            include 'views/partners/kosapacha-usa.php';
            break;
        case 'kp-sa':
            $_SESSION['title'] = 'Kosapacha Sudamerica';
            include 'views/partners/kosapacha-sa.php';
            break;
        case 'kp-foundation':
            $_SESSION['title'] = 'Kosapacha Fundación';
            include 'views/partners/kosapacha-foundation.php';
            break;
        case 'contact':
            $_SESSION['title'] = 'Kosapacha Contacto';
            include 'views/contact.php';
            break;
        case 'swap-language':
            $oldLang = filter_input(INPUT_GET, 'language', FILTER_SANITIZE_STRING);
            if ($oldLang == 'es') {$_SESSION['lang'] = 'en';} else {$_SESSION['lang'] = 'es';}
            setcookie('preferred-language', $_SESSION['lang'], time() + (86400 * 90));
            header('Location: /kosapacha/');
            break;
        case 'send-message':
            $_SESSION['message'] = 'Message Sent!';
            include 'views/contact.php';
            break;
        case 'about':
            $_SESSION['title'] = 'Sobre Kosapacha Group';
            include 'views/about.php';
            break;
        default:
            $_SESSION['title'] = 'Kosapacha Groupo Inicio';
            include 'views/home.php';
            break;
    }
} 
else {
    switch ($action){
        case 'medical':
            $_SESSION['title'] = 'Kosapacha Medical Products';
            include 'views/product.php';
            break;
        case 'kp-usa':
            $_SESSION['title'] = 'Kosapacha USA';
            include 'views/partners/kosapacha-usa.php';
            break;
        case 'kp-sa':
            $_SESSION['title'] = 'Kosapacha South America';
            include 'views/partners/kosapacha-sa.php';
            break;
        case 'kp-foundation':
            $_SESSION['title'] = 'Kosapacha Foundation';
            include 'views/partners/kosapacha-foundation.php';
            break;
        case 'contact':
            $_SESSION['title'] = 'Kosapacha Contact Us';
            include 'views/contact.php';
            break;
        case 'send-message':
            $contactName = filter_input(INPUT_POST, 'contactName', FILTER_SANITIZE_STRING);
            $contactEmail = filter_input(INPUT_POST, 'contactEmail', FILTER_SANITIZE_STRING);
            $contactMessage = filter_input(INPUT_POST, 'contactMessage', FILTER_SANITIZE_STRING);
            
            $mailTo = 'elitethan@gmail.com';
            $subject = 'New Kosapacha Message From '. $contactName;
            $message = $contactMessage . '\n \n Reply to this message at: ' . $contactEmail;
            $headers = "From: " . $contactEmail;
            mail($mailTo, $subject, $message, $headers);
            
            $_SESSION['message'] = $returnMessage;
            include 'views/contact.php';
            break;
        case 'swap-language':
            $oldLang = filter_input(INPUT_GET, 'language', FILTER_SANITIZE_STRING);
            if ($oldLang == 'es') {$_SESSION['lang'] = 'en';} else {$_SESSION['lang'] = 'es';}
            setcookie('preferred-language', $_SESSION['lang'], time() + (86400 * 90));
            header('Location: /kosapacha/');

            break;
        case 'about':
            $_SESSION['title'] = 'Kosapacha Group About';
            include 'views/about.php';
            break;
        default:
            $_SESSION['title'] = 'Kosapacha Group Home';
            include 'views/home.php';
            break;
    }
}



?>