<?php 
class User {
    

private $user_id;
private $user_name;
private $first_name;
private $last_name;
private $email;
private $charityNum;
private $address;
private $hash;
private $user_type;
private $crypto_wallet;
private $approved;
private $user_avatar_url;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('User constructor requires an array');
    }

    $this->setUserID($args['user_id'] ?? NULL);
    $this->setCharityNum($args['charity_num'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setFirstName($args['first_name'] ?? NULL);
    $this->setLastName($args['last_name'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setAddress($args['address'] ?? NULL);
    $this->setHash($args['hash'] ?? NULL);
    $this->setUserType($args['user_type'] ?? NULL);
    $this->setCryptoWallet($args['crypto_wallet'] ?? NULL);
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

public function getFirstName() {
    return $this->first_name;
}

public function getLastName() {
    return $this->last_name;
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

public function getUserType() {
    return $this->user_type;
}

public function getCryptoWallet() {
    return $this->crypto_wallet;
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

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();
    
    if($charityNum == NULL) {
       if($path == '/RegisterCharity'){
            header('Location: RegisterCharity?message=CHARITYNUMBER_MISSING');
            $this->charityNum = NULL;
            exit();
        }
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
        else if($path === '/RegisterCharity'){
            header('Location: RegisterCharity?message=CHARITYNAME_MISSING');
            $this->user_name = NULL;
            exit();
        }
    }

    $this->user_name = $user_name;
}

public function setFirstName($first_name) {

    if($first_name == NULL) {
        $this->first_name = NULL; 
        }
    

    $this->first_name = $first_name;
}

public function setLastName($last_name) {

    if($last_name == NULL) {
        $this->last_name = NULL;
        }
    

    $this->last_name = $last_name;
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
    
    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($address == NULL) {
        if($path === '/Register'){
            header('Location: Register?message=ADDRESS_MISSING');
            $this->address = NULL;
            exit(); 
        }
        else if($path === '/RegisterCharity'){          
                header('Location: RegisterCharity?message=ADDRESS_MISSING');
                $this->address = NULL;
                exit();            
        }
    }
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

public function setUserType($user_type) {

    if($user_type === NULL) {
        $this->user_type = NULL;
        return;
    }

    $this->user_type = $user_type;
}

public function setCryptoWallet($crypto_wallet) {
    $this->crypto_wallet = $crypto_wallet;
}

public function setApproved($approved) {
    $this->approved = $approved;
}

public function setURL($user_avatar_url) {
    $this->user_avatar_url = $user_avatar_url;
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

    $stt = $pdo->prepare('INSERT INTO users (user_name, first_name, last_name, email, address, hash) 
    VALUES (:user_name, :first_name, :last_name, :email, :address, :hash)');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'first_name' => $this->getFirstName(),
        'last_name' => $this->getLastName(),
        'email' => $this->getEmail(),
        'address' => $this->getAddress(),
        'hash' => $hash
    ]);

    $saved = $stt->rowCount() === 1;

    return $saved;
}

public function charityRegister(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        header('Location: RegisterCharity?message=INVALID_PDO');
    }

    $password = $this->getHash();
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    if($this->findOneByUsername($this->getUserName(), $pdo) == TRUE ){
        header('Location: RegisterCharity?message=USERNAME_TAKEN');
        exit();
    }

    if($this->findOneByEmail($this->getEmail(), $pdo) == TRUE ){
        header('Location: RegisterCharity?message=EMAIL_TAKEN');
        exit();
    }

    $stt = $pdo->prepare('INSERT INTO users (user_name, charity_num, email, address, hash, user_type) 
    VALUES (:user_name, :charity_num, :email, :address, :hash, :user_type)');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'charity_num' => $this->getCharityNum(),
        'email' => $this->getEmail(),
        'address' => $this->getAddress(),
        'hash' => $hash,
        'user_type' => 'charity'
    ]);

    $saved = $stt->rowCount() === 1;

    return $saved;
}

public function login(PDO $pdo, $req) {

        if(!($pdo instanceof PDO)) {
            throw new Exception('Invalid PDO object for User');
        }

        $stt = $pdo->prepare('SELECT user_name, hash, user_type, email FROM users WHERE user_name = :user_name LIMIT 1');
        $stt->execute([
            'user_name' => $this->getUserName()
        ]);

        $row = $stt->fetch();

        if ($row === FALSE || password_verify(\Rapid\Request::body('password'), $row['hash']) !== TRUE) {
            header('Location: Login?message=BAD_CREDENTIALS');
            exit();
        }
        $req->sessionSet('Logged_in', True);
        $req->sessionSet('user_name', $this->getUserName());
}

public static function findOneByUsername($username, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for User findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT user_name FROM users WHERE user_name = :user_name LIMIT 1');
    $stt->execute([
        'user_name' => $username
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
        throw new Exception('Invalid PDO object for User findOneByUsername');
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
}

public static function findAllUsers($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for User findAllUsers');
    }

    $stt = $pdo->prepare('SELECT user_id, user_name FROM users');
    $stt->execute();

    return $stt;
}

public static function findAllUsersForOneUser($user_name,$pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for User findAllUsersForOneUser');
    }

    $stt = $pdo->prepare('SELECT user_name FROM users WHERE user_name != :user_name');
    $stt->execute([
        'user_name' => $user_name
    ]);

    return $stt;
}

public static function findAll($pdo) {

    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for User findAll');
    }

    $stt = $pdo->prepare('SELECT user_id, charity_num, user_name, email, address, crypto_wallet, user_type, user_avatar_url FROM users');
    $stt->execute();

    return $stt;
}

public static function findOneByUsernameProfile($user_name, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for User findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT user_id, user_name, email, crypto_wallet, charity_num, address, approved, user_avatar_url FROM users WHERE user_name = :user_name LIMIT 1');
    $stt->execute([
        'user_name' => $user_name
    ]);

      return $stt;
}

public static function findAllCharities($pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for User findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT user_id, user_name, email, crypto_wallet, charity_num, address, approved, user_avatar_url FROM users WHERE user_type = :user_type LIMIT 1');
    $stt->execute([
        'user_type' => "charity"
    ]);

      return $stt;
}



public function displayCharityCard($following)
{
    
    if(in_array($following, $this->getUserName()))
    {
        echo"Unfollow";
    }
    else{
        echo"Follow";
    }

    ?>
    <div class="col-md-4 mt-4">
    		    <div class="card profile-card-5">
    		        <div class="card-img-block">
    		            <img class="card-img-top" src="./<?=$this->getURL()?>" alt="Card image cap">
    		        </div>
                    <div class="card-body pt-0">
                    <h5 class="card-title"><?=$this->getUserName()?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?=$this->getUserName()?>" class="btn btn-primary">Profile</a>
                  </div>
                </div>
    		</div>
    		
    	</div>
    </div>
    <?php
}

}?>