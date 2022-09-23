<?php
include('Data_Access.php');
?>
<html>
    <body>
        <?php
            $myfile = fopen("currentUser.txt", "r") or die("Unable to open file!");
            $curr_user = fread($myfile,filesize("currentUser.txt"));
            fclose($myfile);

            clearUserCart($curr_user);

            unlink('cart.json');
            unlink('currentUser.txt');
            header("Location: ../template/LoggedOut.html", TRUE, 200);
        ?>
    </body>
</html>