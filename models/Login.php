<?php class Login {
private $user_id;
private $user_name;
private $email;
private $hash;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Login constructor requires an array');
    }

    $this->setUserID($args['userID'] ?? NULL);
    $this->setUserName($args['userName'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setHash($args['hash'] ?? NULL);
}

public function getUserID() {
    return $this->userID;
}

public function getUserName() {
    return $this->userName;
}

public function getEmail() {
    return $this->email;
}

public function getHash() {
    return $this->hash;
}

public function getRole() {
    return $this->role;
}

public function setUserID($userID) {
    

   $this->userID = $userID;
}

public function setUserName($userName) {

 
    $this->userName = $userName;
}


public function setEmail($email) {


    $this->email = $email;
}

public function setHash($hash) {


    $this->hash = $hash;
    
}

public function login(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login register');
    }

    $stt = $pdo->prepare('SELECT user_name, hash FROM users WHERE user_name = :user_name LIMIT 1');
    $stt->execute([
      'user_name' => $this->getUserName()
    ]);

    $row = $stt->fetch();




}
}