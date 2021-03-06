<?php

function getAllProducts() {
    $allProducts = array();
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM products;';
    $db = kosapachaConnect();
    $table = "";
    foreach ($db->query($sql) as $row) {
        $allProducts[] = $row;
    }
    return $allProducts;
}

function populateProducts($array) {
    $table = "";
    foreach ($array as $row) {
        $table .= '<tr"><td><a href="/kosapacha/products/index.php/?action=selectProduct&product=' . $row['product_id'] . '">' . $row['product_name'] . '</a></td>'
                . '<td><img src="/kosapacha' . $row['product_image'] . '" alt="Product Image"></td></tr>';
    }
        return $table;
 }

 function displaySelectedProduct($productList, $productNum) {
    for ($i = 0; $i < count($productList); $i++) {
        if ($productList[$i]['product_id'] == $productNum) {
            return $productList[$i];
        };
    }
 }
?>

