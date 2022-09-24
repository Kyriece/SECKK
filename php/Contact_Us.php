<?php
include('des.php');
?>
<html>
    <body>
        <?php
            $message = $_POST['message'];
	        $key = "des";
            
            $recovered_message = php_des_decryption($key, $message);
            //echo "Received encrypted Message: " . $recovered_message . "<br/><br/>"; 

            $fp = fopen('message.txt', 'a');//opens file in append mode  
            fwrite($fp, $recovered_message.concat("\n"));  
            fclose($fp);  
            
            echo "File appended successfully";  
        ?>
    <body>
</html>