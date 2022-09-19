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
        
        ?>
    </body>
</html>