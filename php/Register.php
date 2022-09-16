<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        //Receive user input from clint side
        $user_input = $_REQUEST['username'];
        $user_password = $REQUEST['userPassword'];

        echo $user_input;
        ?>
    </body>
</html>