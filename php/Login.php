<html>
    <body>
        <?php
        //Receive user input from clint side
        $user_input = $_POST['input'];
        //open the database file named "database.txt"
        $file = fopen("../database/database.txt","a");
        //insert $user_input into the database.txt
        fwrite($file, $user_input."\n");
        //close the "$file"
        fclose($file);
        echo "The hash value has been added to the 
        database/database.txt";
        ?>
    </body>
</html>