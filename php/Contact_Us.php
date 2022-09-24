<?php
include('des.php');
?>
<html>
    <body>
        <?php
            $message = $_POST['message'];
	        $key = "des";
            
            $recovered_message = php_des_decryption($key, $message);

            $fp = fopen('message.txt', 'a');//opens file in append mode  
            fwrite($fp, $recovered_message);  
            fclose($fp);  
            
            echo "message sent";  
        ?>
    <body>
</html>