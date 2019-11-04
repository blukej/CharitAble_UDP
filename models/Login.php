<?php class Login {
private $user_id;
private $user_name;
private $email;
private $address;
private $hash;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Login constructor requires an array');
    }

    $this->setUserID($args['user_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setAddress($args['address'] ?? NULL);
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

public function getAddress() {
    return $this->address;
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

public function setHash($hash) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($hash == NULL) {
        if($path === '/Login'){
            header('Location: Login?message=PASSWORD_MISSING');
            $this->hash = NULL;
            exit();
        }
        else if($path === '/Register'){
            header('Location: Register?message=PASSWORD_MISSING');
            $this->hash = NULL;
            exit();
        }
    }
    
    if($path === '/Register'){
        if(strlen($hash) <= '8' || !preg_match("#[0-9]+#",$hash) || !preg_match("#[A-Z]+#",$hash) || !preg_match("#[a-z]+#",$hash)){
            header('Location: Register?message=PASSWORD_INVALID');
            $this->hash = NULL;
            exit();
        }
    }

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
        header('Location: Register?message=INVALID_PDO');
    }

    $password = $this->getHash();
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    if($this->findOneByUsername($this->getUserName(), $pdo) == TRUE ){
        header('Location: Register?message=USERNAME_TAKEN');
        exit();
    }

    if($this->findOneByEmail($this->getEmail(), $pdo) == TRUE ){
        header('Location: Register?message=EMAIL_TAKEN');
        exit();
    }

    $stt = $pdo->prepare('INSERT INTO users (user_name, email, address, hash) 
    VALUES (:user_name, :email, :address, :hash)');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'email' => $this->getEmail(),
        'address' => $this->getAddress(),
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

        if ($row === FALSE || password_verify(\Rapid\Request::body('password'), $row['hash']) !== TRUE) {
            header('Location: Login?message=BAD_CREDENTIALS');
            exit();
        }

        $_SESSION['USERNAME'] = $row['user_name'];
        header('Location: index.php');  
}

public static function findOneByUsername($username, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT user_name FROM users WHERE user_name = :user_name LIMIT 1');
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
        throw new Exception('Invalid PDO object for Login findOneByUsername');
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