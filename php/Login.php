<?php
include('Data_Access.php');
include('rsa.php');
?>

<html>
    <body>
        <?php
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
        $ret3 = getCustomerID($dbReturned, $user_name);
        $userPass = "";
        $user_role = "";
        $user_id = "";
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $userPass = $row['userPassword'];
        }
        while($row = $ret2->fetchArray(SQLITE3_ASSOC) ) {
            $user_role = $row['userRole'];

        }
        while($row = $ret2->fetchArray(SQLITE3_ASSOC)){
            $user_id = $row['userID'];
        }
        //$time_stamp = $time_stamp + 3; -->Testing
        $time_diff = abs($server_time_stamp - $time_stamp);
        if($time_diff < 150){
            if($hashed_password == $userPass && $user_role == 'user'){
                header("Location: ../template/home.html", TRUE, 301);

                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                $txt = $user_id;
                fwrite($myfile, $txt);
                fclose($myfile);

                exit();
            }else if($hashed_password == $userPass && $user_role == 'productAdmin'){
                header("Location: ../template/ProductManagement.html", TRUE, 301);

                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                $txt = $user_id;
                fwrite($myfile, $txt);
                fclose($myfile);

                exit();
            }else if($hashed_password == $userPass && $user_role == 'userAdmin'){
                header("Location: ../template/UserAdmin.html", TRUE, 301);

                $myfile = fopen("currentUser.txt", "w") or die("Unable to open file!");
                $txt = $user_id;
                fwrite($myfile, $txt);
                fclose($myfile);

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