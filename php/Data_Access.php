<?php

class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../coffeedb.db');
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

function getUserRole($dbReturned, $user_name){
    $db = $dbReturned;

    $sql =<<<EOF
      SELECT userRole FROM CUSTOMER WHERE userName = "$user_name";
    EOF;

    $ret = $db->query($sql);

    return $ret;
}

function createNewUser($dbReturned, $user_name, $user_password, $user_email, $user_first, $user_last, $user_phone, $user_role){
    $db = new SQLite3('../coffeedb.db');
    
    $db->exec("INSERT INTO Customer (userName, userEmail, userFirstName, userLastName, userPassword, userPhoneNumber, userRole) VALUES ('$user_name', '$user_email', '$user_first', '$user_last', '$user_password', '$user_phone','$user_role')");
    $db->close();
}

function getProduct($dbReturned, $product_name){
    $db = $dbReturned;
    $sql =<<<EOF
      SELECT * FROM CUSTOMER WHERE productName = "$product_name";
    EOF;
    $ret = $db->query($sql);
    return $ret;
}

?>
