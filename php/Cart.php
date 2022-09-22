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
            $user_id = 0;
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $user_id = $row['userID'];
            }
            echo $user_id;
        ?>
    </body>
</html>