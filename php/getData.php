<?php
include('Data_Access.php');
?>
<html>
    <body>
        <h1>Lab 7 Demo 2: PHP DES test</h1>
        <?php
            $db = openDB();
            $ret = getAllCatalog($db);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                echo "productID = ". $row['productID'] . "\n";
                echo "productName = ". $row['productName'] ."\n";
                echo "productQuantity = ". $row['productQuantity'] ."\n";
                echo "productPrice = ".$row['productPrice'] ."\n\n";
             }
             
             $ret = getAllCustomer($db);
             while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                echo "userID = ". $row['userID'] . "\n";
                echo "userName = ". $row['userName'] ."\n";
                echo "userEmail = ". $row['userEmail']."\n";
                echo "userFirstName = ".$row['userFirstName']."\n";
                echo "userLastName = ".$row['userLastName']."\n";
                echo "userPassword = ".$row['userPassword']."\n\n";
             }
             closeDB($db);
            
        ?>
    </body>
</html>

