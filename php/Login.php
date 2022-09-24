<?php
include('Data_Access.php');
include('rsa.php');
include('des.php');
?>

<html>
    <body>
        <?php
        //Get values with http POST
        $user_name = $_POST['username'];
        $encrypted_user_password = $_POST['userPassword'];

        //Decrypt DES first
        $des_key = "DES_KEY";
        echo $recovered_message;
        echo "\n";
        $recovered_message = php_des_decryption($des_key, $encrypted_user_password);
        echo $recovered_message;
        /*
        //Decrypt password
        $privateKey = get_rsa_privatekey('private.key');
        $decrypted = rsa_decryption($recovered_message, $privateKey);
        $split_value = explode("&", $decrypted);
        $hashed_password = $split_value[0];
        $time_stamp = $split_value[1];
        $server_time_stamp = time();
        
        $db = openDB();
        $ret = getCustomerPassword($db, $user_name);
        $ret2 = getUserRole($db, $user_name);
        $ret3 = getCustomerID($db, $user_name);
        $userPass = "";
        $user_role = "";
        $user_id = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $userPass = $row['userPassword'];
        }
        while($row = $ret2->fetchArray(SQLITE3_ASSOC) ) {
            $user_role = $row['userRole'];

        }
        while($row = $ret3->fetchArray(SQLITE3_ASSOC)){
            $user_id = $row['userID'];
        }
        //$time_stamp = $time_stamp + 3; -->Testing
        $time_diff = abs($server_time_stamp - $time_stamp);
        if($time_diff < 150){
            if($hashed_password == $userPass && $user_role == 'user'){
                
                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $user_id);
                fclose($myfile);
                header("Location: ../template/home.html", TRUE, 301);
                exit();
            }else if($hashed_password == $userPass && $user_role == 'productAdmin'){
                

                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                $txt = $user_id;
                fwrite($myfile, $user_id);
                fclose($myfile);
                header("Location: ../template/ProductManagement.html", TRUE, 301);
                exit();
            }else if($hashed_password == $userPass && $user_role == 'userAdmin'){
                
                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                $txt = $user_id;
                fwrite($myfile, $user_id);
                fclose($myfile);
                header("Location: ../template/UserAdmin.html", TRUE, 301);
                exit();
            }else{
                header("Location: ../template/LoginFail.html", TRUE, 301);
                exit();
            }
        }else{
            echo "SECURITY ISSUE!";
        }

        closeDB($db);*/ 
        ?>
    </body>
</html>