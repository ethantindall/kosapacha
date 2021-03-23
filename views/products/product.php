<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/small.css">
    <script src="/script.js"></script>
    <title> <?php echo $_SESSION['title'] ?></title>
</head>
<body>

    <header>

        <?php require '../snippets/header.php'; ?>
 
    </header>
    <main>


    <main>
        <div class="product-details">
        <img src="<?php echo $selectedProduct['product_image']; ?>" alt="Product Image">
        <h1><?php if ($_SESSION['lang'] == 'es') {
            echo $selectedProduct['product_name_es'];}
            else {echo $selectedProduct['product_name'];} ?></h1>

        <h3>$<?php echo $selectedProduct['product_price']; ?></h3>
        <p><?php if ($_SESSION['lang'] == 'es') {
            echo $selectedProduct['product_description_es'];}
            else {echo $selectedProduct['product_description'];} ?></p>
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="<?php echo $selectedProduct['product_button']; ?>">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        </div>
    </main>


    <footer>
        <?php if ($_SESSION['lang'] == 'es') {require '../snippets/es/footer-es.php';}
            else {require '../snippets/footer.php';} ?>
    </footer>

</body>
</html>
