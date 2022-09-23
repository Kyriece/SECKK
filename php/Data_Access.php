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

function getCustomerID($dbReturned, $username){
    $db = $dbReturned;

    $sql =<<<EOF
        SELECT userID FROM Customer WHERE username = "$username";
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

function createNewUser($user_name, $user_password, $user_email, $user_first, $user_last, $user_phone, $user_role){
    $db = new SQLite3('../coffeedb.db');
    
    $db->exec("INSERT INTO Customer (userName, userEmail, userFirstName, userLastName, userPassword, userPhoneNumber, userRole) VALUES ('$user_name', '$user_email', '$user_first', '$user_last', '$user_password', '$user_phone','$user_role')");
    $db->close();
}

function addProduct($product_ID, $product_name, $product_quantity, $product_price){
    $db = new SQLite3('../coffeedb.db');
    $db->exec("INSERT INTO Catalog (productID, productName, productQuantity, productPrice) VALUES ($product_ID, "$product_name", $product_quantity, $product_price)");
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

function getCartDetailsForUser($dbReturned, $user_ID, $product_id){
    $db = $dbReturned;
    $sql =<<<EOF
      SELECT * FROM Cart WHERE CartID = $user_ID and ProductID = $product_id
    EOF;
    $ret = $db->query($sql);
    return $ret;
}

function getAllCartDetails($dbReturned, $user_ID){
    $db = $dbReturned;
    $sql =<<<EOF
    SELECT Cart.CartID, Cart.ProductID,  Cart.Quantity, Catalog.productName, Catalog.productQuantity, Catalog.productPrice
    FROM Cart
    INNER JOIN Catalog ON Cart.ProductID = Catalog.productID
    WHERE Cart.CartID = $user_ID
    EOF;
    $ret = $db->query($sql);
    return $ret;
}

function updateCartQuantity($curr_user ,$product_id, $quantity){
    //CartID is userID, will be deleted after each purchase
    $db = new SQLite3('../coffeedb.db');
    $db->exec("UPDATE Cart SET Quantity = $quantity WHERE CartID = $curr_user and ProductID = $product_id");
    $db->close();
}

function checkIfProductExist($cartID, $productID){
    $db = $dbReturned;
    $sql =<<<EOF
      SELECT productID FROM Cart WHERE CartID = $user_ID;
    EOF;
    $ret = $db->query($sql);
    return $ret;
}

function insertNewItemToCart($curr_user ,$product_id, $quantity){
    $db = new SQLite3('../coffeedb.db');
    $db->exec("INSERT INTO Cart (CartID, ProductID, Quantity) VALUES ($curr_user ,$product_id, $quantity)");
    $db->close();
}

?>
