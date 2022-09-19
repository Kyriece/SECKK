<?php

class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../SECKK.db');
    }
}

function openDB(){
    $db = new MyDB();
    return $db;
}

function closeDB($db){
    $db->close();
}

function getAllCatalog($dbReturned){
    $db = $dbReturned;

    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    $sql =<<<EOF
      SELECT * from CATALOG;
    EOF;

    $ret = $db->query($sql);

    return $ret;
}

function getAllCustomer($dbReturned){
    $db = $dbReturned;

    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    $sql =<<<EOF
      SELECT * from CUSTOMER;
    EOF;

    $ret = $db->query($sql);

    return $ret;
}

function getCustomerPassword($dbReturned, $username){
    $db = $dbReturned;

    $sql =<<<EOF
      SELECT userPassword FROM CUSTOMER WHERE userName = "$username";
    EOF;

    $ret = $db->query($sql);

    return $ret;
}

function createNewUser($dbReturned, $user_name, $user_password, $user_email, 
    $user_first, $user_last, $user_phone){
    $db = $dbReturned;
    
    //can use query to update
    //see this https://www.w3schools.com/php/php_mysql_insert.asp
    $sql = 'INSERT INTO Customer (userName, userEmail, userFirstName, userLastName, userPassword, userPhoneNumber) '
            . 'VALUES(:user_name, :user_email, :user_first, :user_last, :user_password, :user_phone)';
        
    $stmt = $db.prepapre($sql);
    $stmt->execute([
        ':user_name' => $user_name,
        ':user_email' => $user_email,
        ':user_first' => $user_first,
        ':user_last' => $user_last,
        ':user_password' => $user_password.,
        ':user_phone'=> $user_phone,
    ]);
}

?>
