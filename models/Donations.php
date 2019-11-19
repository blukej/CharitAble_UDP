<?php class Donations {

private $user_name;
private $user_id;
private $charity_name;
private $amount;
private $timestamp;
private $subscription;
private $frequency;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Donations constructor requires an array');
    }

    $this->setUserName($args['user_name'] ?? NULL);
    $this->setUserID($args['user_id'] ?? NULL);
    $this->setCharityName($args['charity_name'] ?? NULL);
    $this->setAmount($args['amount'] ?? NULL);
    $this->setTimestamp($args['timestamp'] ?? NULL);
    $this->setSubscription($args['subscription'] ?? NULL);
    $this->setFrequency($args['frequency'] ?? NULL);
}

public function getUserID() {
    return $this->user_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getCharityName() {
    return $this->charity_name;
}

public function getAmount() {
    return $this->amount;
}

public function getTimestamp() {
    return $this->timestamp;
}

public function getFrequency() {
    return $this->frequency;
}

public function setUserID($user_id) {
    
    if($user_id === NULL) {
       $this->user_id = NULL;
       return;
    }

   $this->user_id = $user_id;
}

public function setUserName($user_name) {
    
    if($user_name === NULL) {
       $this->user_name = NULL;
       return;
    }

   $this->user_name = $user_name;
}

public function setCharityName($charity_name) {
    
    if($charity_name === NULL) {
       $this->charity_name = NULL;
       return;
    }

   $this->charity_name = $charity_name;
}

public function setAmount($amount) {
    
    if($amount === NULL) {
       $this->amount = NULL;
       return;
    }

   $this->amount = $amount;
}

public function setTimestamp($timestamp) {
    
    if($timestamp === NULL) {
       $this->timestamp = NULL;
       return;
    }

   $this->timestamp = $timestamp;
}

public function setSubscription($subscription) {
    
    if($subscription === NULL) {
       $this->subscription = NULL;
       return;
    }

   $this->subscription = $subscription;
}

public function setFrequency($frequency) {
    
    if($requency === NULL) {
       $this->requency = NULL;
       return;
    }

   $this->requency = $requency;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Donations save');
    }

        $stt = $pdo->prepare('INSERT INTO donations (user_id, user_name, charity_name, amount, timestamp, subscription, frequency) 
        VALUES (:user_id, :user_name, :charity_name, :amount, :timestamp, :subscription, :frequency)');
        $stt->execute([
            'user_id' => $this->getUserID(),
            'user_name' => $this->getUserName(),
            'charity_name' => $this->getCharityName(),
            'amount' => $this->getAmount(),
            'timestamp' => $this->getTimestamp(),
            'subscription' => $this->getSubscription(),
            'frequency' => $this->getFrequency()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}

public static function findAllByUsername($username, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Donations findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT charity_name, amount, timestamp, subscription, frequency FROM donations WHERE user_name = :user_name');
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

public function findAll($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Comment findAll');
    }

    $stt = $pdo->prepare('SELECT user_id, user_name, charity_name, amount, timestamp, subscription, frequency FROM donations');
    $stt->execute();

    return $stt;
}

}?>