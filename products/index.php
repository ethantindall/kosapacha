<?php
session_start();

require_once '../library/functions.php';
require_once '../library/connection.php';
require_once '../model/product-model.php';



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

if ($_SESSION['lang'] == 'es') {
     switch ($action){
        case 'products':
            $product = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_NUMBER_INT);
            include '/kosapacha/views/products/products.php';
            break;
        default:
            $_SESSION['title'] = 'Tipos de Productos de Kosapacha';
            if (!isset($_SESSION['products'])) {
                $_SESSION['products'] = populateProducts();
            }
            $productList = $_SESSION['products'];

            include '/kosapacha/views/products/products-overview.php';
            break;  
        }
    }
    else {
        switch ($action){
            case 'products':
                $product = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_NUMBER_INT);
                include '../views/products/product.php';
                break;
            default:
                $_SESSION['title'] = 'Kosapacha Product Types';
                if (!isset($_SESSION['products'])) {
                    $_SESSION['products'] = populateProducts();
                }
                $productList = $_SESSION['products'];

                include '../views/products/products-overview.php';
                break;
            }
        }
?>
