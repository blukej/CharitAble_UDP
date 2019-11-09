<?php 
    session_start();
class UserProfile {
    

private $user_id;
private $charityNum;
private $user_name;
private $email;
private $address;
private $crypto_wallet;
private $user_type;
private $approved;
private $user_avatar_url;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('UserProfile constructor requires an array');
    }

    $this->setUserID($args['user_id'] ?? NULL);
    $this->setCharityNum($args['charityNum'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setAddress($args['address'] ?? NULL);
    $this->setCryptoWallet($args['crypto_wallet'] ?? NULL);
    $this->setUserType($args['user_type'] ?? NULL);
    $this->setApproved($args['approved'] ?? NULL);
    $this->setURL($args['user_avatar_url'] ?? NULL);
}

public function getUserID() {
    return $this->user_id;
}

public function getCharityNum() {
    return $this->charityNum;
}

public function getUserName() {
    return $this->user_name;
}

public function getEmail() {
    return $this->email;
}

public function getAddress() {
    return $this->address;
}

public function getCryptoWallet() {
    return $this->crypto_wallet;
}

public function getUserType() {
    return $this->user_type;
}

public function getApproved() {
    return $this->approved;
}

public function getURL() {
    return $this->user_avatar_url;
}

public function setUserID($user_id) {
    
    if($user_id === NULL) {
       $this->user_id = NULL;
       return;
    }

   $this->user_id = $user_id;
}

public function setCharityNum($charityNum) {
    
    if($charityNum === NULL) {
       $this->charityNum = NULL;
       return;
    }

   $this->charityNum = $charityNum;
}

public function setUserName($user_name) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();
    if($user_name == NULL) {
        if($path === '/Login'){
            header('Location: Login?message=USERNAME_MISSING');
            $this->user_name = NULL;
            exit();
            
        }
        else if($path === '/Register'){
            header('Location: Register?message=USERNAME_MISSING');
            $this->user_name = NULL;
            exit();
        }
    }

    $this->user_name = $user_name;
}

public function setEmail($email) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($email == NULL) {
        if($path === '/Register'){
        header('Location: Register?message=EMAIL_MISSING');
        $this->email = NULL;
        exit(); 
        }
    }

    $this->email = $email;
}

public function setAddress($address) {
    $this-> address = $address;
}


public function setUserType($user_type) {

    if($user_type === NULL) {
        $this->user_type = NULL;
        return;
    }

    $this->user_type = $user_type;
}

public function setCryptoWallet($crypto_wallet) {
    $this-> crypto_wallet = $crypto_wallet;
}

public function setApproved($approved) {
    $this-> approved = $approved;
}

public function setURL($user_avatar_url) {
    $this-> user_avatar_url = $user_avatar_url;
}

public static function findAll($pdo) {

    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for UserProfile findAll');
    }

    $stt = $pdo->prepare('SELECT user_id, charity_num, user_name, email, address, crypto_wallet, user_type, user_avatar_url FROM users');
    $stt->execute();

    return $stt;
}

public static function findOneByUsername($user_name, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for UserProfile findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT user_id, charity_num, user_name, email, address, crypto_wallet, user_type, user_avatar_url FROM users WHERE user_name = :user_name LIMIT 1');
    $stt->execute([
        'user_name' => $user_name
    ]);

    if ($stt->rowCount() > 0) {
        $bool = True;
      } else {
         $bool = False;
      }

      return $bool;
}

public static function findOneByEmail($email, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for UserProfile findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT email FROM users WHERE email = :email LIMIT 1');
    $stt->execute([
        'email' => $email
    ]);

    if ($stt->rowCount() > 0) {
        $bool = True;
      } else {
         $bool = False;
      }

      return $bool;
}}?>