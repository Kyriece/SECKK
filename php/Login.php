<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $user_name = $_POST['username'];
        $user_password = $_POST['userPassword'];
        $db = openDB();
        $ret = getCustomerPassword($db, $user_name);
        $userPass = "";
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $userPass = $row['userPassword'];
        }
        echo "The password is: ".$userPass;
        ?>
    </body>
</html>