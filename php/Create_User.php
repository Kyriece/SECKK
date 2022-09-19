<?php
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function createNewUser($user_name, $user_password, $user_email, 
    $user_first, $user_last, $user_phone){
    
    //can use query to update
    //see this https://www.w3schools.com/php/php_mysql_insert.asp
    $sql = 'INSERT INTO Customer (userName, userEmail, userFirstName, userLastName, userPassword, userPhoneNumber) '
            . 'VALUES(:user_name, :user_email, :user_first, :user_last, :user_password, :user_phone)';
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':user_name' => $user_name,
        ':user_email' => $user_email,
        ':user_first' => $user_first,
        ':user_last' => $user_last,
        ':user_password' => $user_password,
        ':user_phone'=> $user_phone,
    ]);
}

?>

