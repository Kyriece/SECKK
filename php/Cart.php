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
            if($ret){
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $quantity = $row["Quantity"];
                }
            
                echo $quantity . "\n";
                $quantity++;
                closeDB($db);

                updateCartQuantity($curr_user, $product_id, $quantity);
                
                $db = openDB();
                $ret = getCartDetailsForUser($db, $curr_user, $product_id);
            
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $quantity = $row["Quantity"];
                }
                echo $quantity;
                closeDB($db);
            }else{
                echo "empty";
            }
           
            
        ?>
    </body>
</html>