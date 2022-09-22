<?php
include('Data_Access.php');
?>
<html>
    <body>
        <?php

            $myfile = fopen("currentUser.txt", "r") or die("Unable to open file!");
            $curr_user =  fread($myfile,filesize("currentUser.txt"));
            fclose($myfile);

            $db = openDB();
            $ret = getCartDetailsForUser($db, $curr_user);
            
            echo $curr_user;
        ?>
    </body>
</html>