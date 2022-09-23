<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $product_ID = $_POST['productID'];
        $product_name = $_POST['productName'];
        $product_quantity = $_POST["productQuantity"];
        $product_price = $_POST["productPrice"];
        addProduct($product_ID, $product_name, $product_quantity, $product_price);
        header("Location: ../template/productAdded.html", TRUE, 200);
        ?>
    </body>
</html>