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
            $ret = getCartDetailsForUser($db, $curr_user);
            $products = array();
            $quantity = array();
            $index = 0;
            if($ret){
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $products[$index] = $row["ProductID"];
                    $quantity[$index] = $row["Quantity"];
                    if($products[$index] == $product_id){
                        echo "break";
                        break;
                        $index++;
                    }
                    $index++;
                }
                for ($x = 0; $x < $index; $x++) {
                    echo $products[$x] . " " . $quantity[$x] . "\n";
                }
                closeDB($db);
/*
                updateCartQuantity($curr_user, $product_id, $quantity[$index]++);
                
                $db = openDB();
                $ret = getCartDetailsForUser($db, $curr_user);
                $index = 0;
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $products[$index] = $row["ProductID"];
                    $quantity[$index] = $row["Quantity"];
                    if($products[$index] == $product_id){
                        break;
                    }
                    $index++;
                }
                for ($x = 0; $x < $index; $x++) {
                    echo $products[$x] . " " . $quantity[$x]. "\n";
                }
                $db = openDB();*/
            }else{
                echo "empty";
            }
           
            
        ?>
    </body>
</html>