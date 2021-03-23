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
    foreach ($array as $row) {
        $table .= '<tr"><td><a href="/products/index.php/?action=selectProduct&product=' . $row['product_id'] . '">' . $row['product_name'] . '</a></td>'
                . '<td><img src="' . $row['product_image'] . '" alt="Product Image"></td></tr>';
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

