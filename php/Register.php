<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        $user_name = $_POST['username'];
        $user_password = $_POST['userPassword'];
        $user_email = $_POST["useremail"];
        $user_first = $_POST["userFirstName"];
        $user_last = $_POST["userLastName"];
        $user_phone = $_POST["userPhoneNumber"];

        $db = openDB();
        
        createNewUser($db, $user_name, $user_password, $user_email, 
            $user_first, $user_last, $user_phone);

        closeDB($db);
        ?>
    </body>
</html>