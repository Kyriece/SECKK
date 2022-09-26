<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $product_ID = $_POST['productID'];
        
        if(removeProduct($product_ID)){
            header("Location: ../template/productRemoved.html", TRUE, 200);
        }else{
            echo "ERROR"
        }
        
        exit();
        ?>
    </body>
</html>