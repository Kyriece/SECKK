<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $user_password = $_POST['userPassword'];
        echo $user_password;
        /*
        $user_name = $_POST['username'];
        $user_password = $_POST['userPassword'];
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
        
        if($user_password == $userPass && $user_role == 'user'){
            header("Location: ../template/home.html", TRUE, 301);
            exit();
        }else if($user_password == $userPass && $user_role == 'productAdmin'){
            header("Location: ../template/ProductManagement.html", TRUE, 301);
            exit();
        }else if($user_password == $userPass && $user_role == 'userAdmin'){
            header("Location: ../template/UserAdmin.html", TRUE, 301);
            exit();
        }else{
            header("Location: ../template/LoginFail.html", TRUE, 301);
            exit();
        }

        closeDB($db);*/
        ?>
    </body>
</html>