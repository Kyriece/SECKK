<?php
include('des.php');
?>
<html>
    <body>
        <?php
            $message = $_POST['message'];
            
	        $key = "DES_KEY";
            $recovered_message = php_des_decryption($key, $message);
            echo "Received encrypted Message: " . $message . "<br/><br/>"; 
        ?>
    <body>
</html>