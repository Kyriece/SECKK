<?php
include('Data_Access.php');
include('rsa.php');
?>

<html>
    <body>
        <?php
        /*
        $encrypted_user_password = $_POST['userPassword'];
        echo $encrypted_user_password;
        // Get the private Key
        $privateKey = get_rsa_privatekey('private.key');
        // compute the decrypted value
        $decrypted = rsa_decryption($encrypted_user_password, $privateKey);
        echo 'decrypted: ' . $decrypted."<br/><br/>";

        // Split decrypted value based on "&"
        echo "<br/>Split the decrypted value based on '&': <br/>";
        $split_value = explode("&", $decrypted);
        echo "split 1 (hashed message): " . $split_value[0]."<br/>";
        echo "split 2 (timestamp): " . $split_value[1]."<br/>";
        */
        //Get values with http POST
        $user_name = $_POST['username'];
        $encrypted_user_password = $_POST['userPassword'];

        //Decrypt password
        $privateKey = get_rsa_privatekey('private.key');
        $decrypted = rsa_decryption($encrypted_user_password, $privateKey);
        $split_value = explode("&", $decrypted);
        $hashed_password = $split_value[0];
        $time_stamp = $split_value[1];
        $server_time_stamp = time();
        
        $db = openDB();
        $ret = getCustomerPassword($db, $user_name);
        $ret2 = getUserRole($db, $user_name);
        $userPass = "";
        $user_role = "";
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $userPass = $row['userPassword'];
        }
        while($row = $ret2->fetchArray(SQLITE3_ASSOC) ) {
            $user_role = $row['userRole'];

        }
        $time_diff = $server_time_stamp - $time_stamp;
        if($time_diff < 1){
            if($hashed_password == $userPass && $user_role == 'user'){
                header("Location: ../template/home.html", TRUE, 301);
                exit();
            }else if($hashed_password == $userPass && $user_role == 'productAdmin'){
                header("Location: ../template/ProductManagement.html", TRUE, 301);
                exit();
            }else if($hashed_password == $userPass && $user_role == 'userAdmin'){
                header("Location: ../template/UserAdmin.html", TRUE, 301);
                exit();
            }else{
                header("Location: ../template/LoginFail.html", TRUE, 301);
                exit();
            }
        }else{
            echo "SECURITY ISSUE!";
        }

        closeDB($db);
        ?>
    </body>
</html>