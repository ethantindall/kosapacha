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


/*-------------GET PRODUCTS--------------*/

if (!isset($_SESSION['productList'])) {
    $_SESSION['productList'] = getAllProducts();
}
if (!isset($_SESSION['productTable'])) {
    $_SESSION['productTable'] = populateProducts($_SESSION['productList']);
}
/*----------SWITCH STATEMENT-------------*/

if ($_SESSION['lang'] == 'es') {
     switch ($action){
        case 'selectProduct':
            $product = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_NUMBER_INT);
            $selectedProduct = displaySelectedProduct($_SESSION['productList'], $product);
            include '../views/products/product.php';
            break;
        default:
            $_SESSION['title'] = 'Tipos de Productos de Kosapacha';
            if (!isset($_SESSION['productTable']) || $_SESSION['productTable'] == '') {
                $_SESSION['productTable'] = populateProducts($_SESSION['productList']);            
            }
            include '../views/products/products-overview.php';
            break;  
        }
    }
    else {
        switch ($action){
            case 'selectProduct':
                $product = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_NUMBER_INT);
                $selectedProduct = displaySelectedProduct($_SESSION['productList'], $product);

                include '../views/products/product.php';
                break;
            default:
                $_SESSION['title'] = 'Kosapacha Product Types';
                if (!isset($_SESSION['productTable']) || $_SESSION['productTable'] == '') {
                    $_SESSION['productTable'] = populateProducts($_SESSION['productList']);            
                }
                include '../views/products/products-overview.php';
                break;  
            }
        }
?>
