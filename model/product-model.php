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
        $table .= '<li>
                            <a href="/kosapacha/products/index.php/?action=selectProduct&product=' . $row['product_id'] . '">' . $row['product_name'] . '
                        <img src="/kosapacha' . $row['product_image'] . '" alt="Product Image"></a>

                    </li>';
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

