<?php class Comments {

private $comment_id;
private $user_name;
private $user_id;
private $text;
private $timestamp;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Comments constructor requires an array');
    }

    $this->setCommentID($args['comment_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setUserID($args['user_id'] ?? NULL);
    $this->setText($args['text'] ?? NULL);
}

public function getCommentID() {
    return $this->comment_id;
}

public function getPostID() {
    return $this->comment_id;
}

public function getUserID() {
    return $this->user_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getText() {
    return $this->text;
}

public function getTimestamp() {
    return $this->timestamp;
}

public function setCommentID($comment_id) {
    
    if($comment_id === NULL) {
       $this->comment_id = NULL;
       return;
    }

   $this->comment_id = $comment_id;
}

public function setUserName($user_name) {
    
    if($user_name === NULL) {
       $this->user_name = NULL;
       return;
    }

   $this->user_name = $user_name;
}

public function setPostID($post_id) {
    
    if($post_id === NULL) {
       $this->post_id = NULL;
       return;
    }

   $this->post_id = $post_id;
}

public function setUserID($user_id) {
    
    if($user_id === NULL) {
       $this->user_id = NULL;
       return;
    }

   $this->user_id = $user_id;
}

public function setText($text) {

    $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
    
    if($text == NULL) {
        header('Location:comments?message=COMMENT_MISSING');
        $this->text = NULL;
        exit;
    }

   $this->text = $text;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Comment save');
    }

        $stt = $pdo->prepare('INSERT INTO comments (post_id, user_name, text) 
        VALUES (:post_id, :user_name, :text)');
        $stt->execute([
            'post_id' => $this->getPostID(),
            'user_name' => $this->getUserName(),
            'text' => $this->getText()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}

public function findAll($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Comment findAll');
    }

    $stt = $pdo->prepare('SELECT comment_id, post_id, user_id, text, timestamp FROM comments');
    $stt->execute();

    return $stt;
}

}?>