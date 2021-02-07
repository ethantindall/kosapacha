<?php

require 'library/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $file = '/tmp/sample-app.log';
  $message = file_get_contents('php://input');
  file_put_contents($file, date('Y-m-d H:i:s') . " Received message: " . $message . "\n", FILE_APPEND);
}

// Create or access a Session
session_start();


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }



$_SESSION['navbar'] = '
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="accounts/index.php/?action=login-page">Log In</a></li>
            </ul>';



switch ($action){
    case 'products-overview':
        $_SESSION['title'] = 'Kosapacha Product Types';
        include 'views/products-overview.php';
        break;
    case 'medical':
        $_SESSION['title'] = 'Kosapacha Medical Products';

        include 'views/product.php';
        break;
    default:
    $_SESSION['title'] = 'Kosapacha Group Home';

        include 'views/home.php';
        break;
}
?>