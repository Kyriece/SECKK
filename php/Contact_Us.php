<?php
include('des.php');
?>
<html>
    <body>
        <?php
            $message = $_POST['message'];
	        $key = "des";
            
            $recovered_message = php_des_decryption($key, $message);

            $inp = file_get_contents('message.json');
            $tempArray = json_decode($inp);
            echo $tempArray;
            array_push($tempArray, $recovered_message);
            $jsonData = json_encode($tempArray);
            file_put_contents('message.json', $jsonData);
        ?>
    <body>
</html>