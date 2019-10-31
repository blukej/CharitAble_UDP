<?php class Login {
private $user_id;
private $user_name;
private $email;
private $hash;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Login constructor requires an array');
    }

    $this->setUserID($args['user_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setHash($args['hash'] ?? NULL);
}

public function getUserID() {
    return $this->user_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getEmail() {
    return $this->email;
}

public function getHash() {
    return $this->hash;
}

public function setUserID($userID) {
    
    if($userID === NULL) {
       $this->userID = NULL;
       return;
    }

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

public function setRole($role) {

    if($role === NULL) {
        $this->role = NULL;
        return;
    }

    $this->role = $role;
}

public function login(PDO $pdo) {

        if(!($pdo instanceof PDO)) {
            throw new Exception('Invalid PDO object for Login register');
        }

        $stt = $pdo->prepare('SELECT user_name, hash FROM users WHERE user_name = :user_name LIMIT 1');
        $stt->execute([
            'username' => $this->getUserName()
        ]);

        $row = $stt->fetch();

        if ($row === FALSE || password_verify($_POST['password'], $row['hash']) !== TRUE) {
            header('Location: login.php?message=BAD_CREDENTIALS');
            exit();
          }

        $_SESSION['USERNAME'] = $row['username'];
        header('Location: index.php');  
    }
}