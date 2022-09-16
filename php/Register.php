<?php
include('Data_Access.php');
?>

<html>
    <body>
        <?php
        //Receive user input from clint side
        //$user_input = $_POST[];
        //$user_password = $POST['userPassword'];

        //echo $user_input;
        foreach ($_POST["usercredentials"] as $usercredential) {
            echo "$usercredential<br>";
          }
        ?>
    </body>
</html>