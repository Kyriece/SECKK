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

?>
