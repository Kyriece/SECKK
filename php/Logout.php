<?php
include('Data_Access.php');
?>
<html>
    <body>
        <?php
            if (file_exists('currentUser.txt')) {
                $myfile = fopen("currentUser.txt", "r") or die("Unable to open file!");
                $curr_user = fread($myfile,filesize("currentUser.txt"));
                fclose($myfile);
                clearUserCart($curr_user);
            }

            //If cart.json exists
            if (file_exists('cart.json')) {
                unlink('cart.json');
            }

            //If currentUser.txt exist
            if (file_exists('currentUser.txt')) {
                unlink('currentUser.txt');
            }
            
            header("Location: ../template/LoggedOut.html");
        ?>
    </body>
</html>