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

public function setUserID($user_id) {
    
    if($user_id === NULL) {
       $this->user_id = NULL;
       return;
    }

   $this->user_id = $user_id;
}

public function setUserName($user_name) {

    $this->user_name = $user_name;
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

public function register(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        header('Location: register?message=INVALID_PDO');
    }

    $password = $this->getHash();
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $stt = $pdo->prepare('INSERT INTO users (user_name, email, hash) 
    VALUES (:user_name, :email, :hash)');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'email' => $this->getEmail(),
        'hash' => $hash
    ]);

    $saved = $stt->rowCount() === 1;

    return $saved;
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

        if ($row === FALSE || password_verify($_POST['password'], $row['hash']) !== TRUE) {
            header('Location: login.php?message=BAD_CREDENTIALS');
            exit();
          }

        $_SESSION['USERNAME'] = $row['user_name'];
        header('Location: index.php');  
    }
}