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

        if(addProduct($product_ID, $product_name, $product_quantity, $product_price){
            header("Location: ../template/productRemoved.html", TRUE, 200);
        }else{
            echo "ERROR"
        }
        
        exit();
        ?>
    </body>
</html>