<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        //Receive user input from clint side
        $user_name = $_POST['username'];
        $user_password = $_POST['userPassword'];

        $returnPass;
        $db = openDB();
        $ret = getCustomerPassword($db, $user_name);
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $returnPass = $row['userName'];
        }

        echo $returnPass;
        closeDB($db);
        ?>
    </body>
</html>