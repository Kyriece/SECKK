<?php
include('Data_Access.php');
?>
<html>
    <body>
        <?php

            $myfile = fopen("currentUser.txt", "r") or die("Unable to open file!");
            $curr_user =  1;//fread($myfile,filesize("currentUser.txt"));
            fclose($myfile);

            $product_id = $_POST['product_id'];

            $db = openDB();
            $ret = getCartDetailsForUser($db, $curr_user, $product_id);
            $quantity = 0;

            $id = 0;
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $id = $row["ProductID"];
            }
            
            //If returned result is not empty, increment the cart quantity
            //for the respective product by 1
            if($id > 0){
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $quantity = $row["Quantity"];
                }
            
                //echo $quantity . "\n";
                $quantity++;
                closeDB($db);

                updateCartQuantity($curr_user, $product_id, $quantity);

                $db = openDB();
                $ret = getAllCartDetails($db, $curr_user);
                
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $jsonArray[] = $row;
                }
                echo json_encode($jsonArray);
                file_put_contents('cart.json', json_encode($jsonArray));
                closeDB($db);

                //header("Location: ../template/Cart.html", TRUE, 301);
            }else{
                echo "empty";
            }
           
            
        ?>
    </body>
</html>