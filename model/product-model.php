<?php

function getAllProducts() {
    $allProducts = array();
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM products;';
    $table = "";
    foreach ($db->query($sql) as $row) {
        $allProducts[] = $row;
    }
    return $allProducts;
}

function populateProducts($array) {
    $table = "";
    if ($_SESSION['lang'] == 'es') {
        foreach ($array as $row) {
            $table .= '<li>
                                <a href="/products/index.php/?action=selectProduct&product=' . $row['product_id'] . '">' . $row['product_name_es'] . '
                            <img src="' . $row['product_image'] . '" alt="Imagen del producto"></a>

                        </li>';
        }
    } else {
        foreach ($array as $row) {
            $table .= '<li>
                                <a href="/products/index.php/?action=selectProduct&product=' . $row['product_id'] . '">' . $row['product_name'] . '
                            <img src="' . $row['product_image'] . '" alt="Product Image"></a>

                        </li>';
        }   
    }
        return $table;
 }

 function displaySelectedProduct($productList, $productNum) {
    $selectedProduct = array();
    for ($i = 0; $i < count($productList); $i++) {
        if ($productList[$i]['product_id'] == $productNum) {
            $selectedProduct = $productList[$i];
        };
    }
    return $selectedProduct;
 }
?>

