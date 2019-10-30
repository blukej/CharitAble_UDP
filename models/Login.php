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

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();


    $this->userName = $userName;
}


public function setEmail($email) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();


    $this->email = $email;
}

public function setHash($hash) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    $this->hash = $hash;
    
}

public function login(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login register');
    }

    $stt = $pdo->prepare('SELECT username, hash FROM users WHERE username = :username LIMIT 1');
    $stt->execute([
      'username' => $this->getUserName()
    ]);

    $row = $stt->fetch();

    if ($row === FALSE || password_verify(\Rapid\Request::body('password'), $row['hash']) !== TRUE) {
         header('Location: login?message=BAD_CREDENTIALS');
         exit();
    }

    $_SESSION['USERNAME'] = $row['username'];

}
}