<?php
    
class Following {

private $follow_id;
private $user_name;
private $follow_user_name;
private $rank;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Post constructor requires an array');
    }

    $this->setFollowID($args['follow_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setFollowUserName($args['follow_user_name'] ?? NULL);
    $this->setRank($args['rank'] ?? NULL);
}

public function getFollowID() {
    return $this->follow_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getFollowUserName() {
    return $this->follow_user_name;
}

public function getRank() {
    return $this->rank;
}

public function setFollowID($follow_id) {
    if($follow_id === NULL) {
        $this->follow_id = NULL;
        return;
     }
 
    $this->follow_id = $follow_id;
}

public function setUserName($user_name) {
    if($user_name === NULL) {
        $this->user_name = NULL;
        return;
     }
 
    $this->user_name = $user_name;
}

public function setFollowUserName($follow_user_name) {
    if($follow_user_name === NULL) {
        $this->follow_user_name = NULL;
        return;
     }
 
    $this->follow_user_name = $follow_user_name;
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

    $stt = $pdo->prepare('INSERT INTO following (user_name, follow_user_name) 
    VALUES (:user_name, :follow_user_name)');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'follow_user_name' => $this->getFollowUserName()
    ]);
}

public function unfollow(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Following');
    }

    $stt = $pdo->prepare('DELETE FROM following WHERE (user_name, follow_user_name) = (:user_name, :follow_user_name) LIMIT 1');
    $stt->execute([
        'user_name' => $this->getUserName(),
        'follow_user_name' => $this->getFollowUserName()
    ]);
}

public function findAllFollows($user_name,$pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Post findAll');
    }

    $stt = $pdo->prepare('SELECT follow_user_name FROM following where user_name = :user_name');
    $stt->execute([
        'user_name' => $user_name
    ]);

    return $stt;
}

}?>