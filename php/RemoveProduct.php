<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $product_ID = $_POST['productID'];
        removeProduct($product_ID);
        header("Location: ../template/productRemoved.html", TRUE, 200);
        ?>
    </body>
</html>