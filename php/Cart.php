<?php
include('Data_Access.php');
?>
<html>
    <body>
        <?php

            $myfile = fopen("currentUser.txt", "r") or die("Unable to open file!");
            $curr_user =  fread($myfile,filesize("currentUser.txt"));
            fclose($myfile);

            $db = openDB();
            $ret = getCartDetailsForUser($db, $curr_user);
            $products = array();
            $quantity = array();
            $index = 0;
            if($ret){
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $products[$index] = $row["ProductID"];
                    $quantity[$index] = $row["Quantity"];
                    $index++;
                }
                
                for ($x = 0; $x <= index; $x++) {
                    echo $products[$x] + " " + $quantity[$x];
                }

            }else{
                echo "empty";
            }
            
            
        ?>
    </body>
</html>