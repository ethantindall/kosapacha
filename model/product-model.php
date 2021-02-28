<?php


function populateProducts() {
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM products;';
    $db = kosapachaConnect();
    $table = "";
    foreach ($db->query($sql) as $row) {
        $table .= '<tr"><td><a href="/kosapacha/products/index.php/?action=products&product=' . $row['product_id'] . '">' . $row['product_name'] . '</a></td>'
                . '<td><img src="/kosapacha' . $row['product_image'] . '" alt="Product Image"></td></tr>';
    }
        return $table;
 }

?>

