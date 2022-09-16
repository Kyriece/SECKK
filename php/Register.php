<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        //Receive user input from clint side
        $user_input = $_POST['usercredentials[username]'];
        $user_password = $_POST['userPassword'];

        echo $user_input;
        echo $user_password;
        
        ?>
    </body>
</html>