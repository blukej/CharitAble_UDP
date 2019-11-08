<?php
    session_start();
class Following {

private $user_id;
private $follower_id;
private $rank;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Post constructor requires an array');
    }

    $this->setUserID($args['user_id'] ?? NULL);
    $this->setFollowerID($args['follower_id'] ?? NULL);
    $this->setRank($args['rank'] ?? NULL);
}

public function getUserID() {
    return $this->user_id;
}

public function getFollowerID() {
    return $this->follower_id;
}

public function getRank() {
    return $this->rank;
}

public function setUserID($user_id) {
    if($user_id === NULL) {
        $this->user_id = NULL;
        return;
     }
 
    $this->user_id = $user_id;
}

public function setFollowerID($follower_id) {
    if($follower_id === NULL) {
        $this->follower_id = NULL;
        return;
     }
 
    $this->follower_id = $follower_id;
}

public function setRank($rank) {
    if($rank === NULL) {
        $this->rank = NULL;
        return;
     }
 
    $this->rank = $rank;
}

public function follow(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Following');
    }

    $stt = $pdo->prepare('INSERT INTO following (user_id, follower_id) 
    VALUES (:user_id, :follower_id)');
    $stt->execute([
        'user_id' => $this->getUserID(),
        'follower_id' => $this->getFollowerID()
    ]);
}
}?>