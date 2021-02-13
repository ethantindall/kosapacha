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

$_SESSION['lang'] = 'es';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }


if ($_SESSION['lang'] = 'es') {
                 switch ($action){
                    case 'products-overview':
                        $_SESSION['title'] = 'Kosapacha Productos Types';
                        include 'views/products-overview.php';
                        break;
                    case 'medical':
                        $_SESSION['title'] = 'Kosapacha Medical Products';
                
                        include 'views/product.php';
                        break;
                    default:
                    $_SESSION['title'] = 'Kosapacha Groupo Inicio';
                        

                        include 'views/home.php';
                        break;
                }
            }

else {
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
            }



?>