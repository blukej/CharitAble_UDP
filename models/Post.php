<?php 
    session_start();
class Post {

private $post_id;
private $user_name;
private $subject;
private $text;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Post constructor requires an array');
    }

    $this->setPostID($args['post_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setSubject($args['subject'] ?? NULL);
    $this->setText($args['text'] ?? NULL);
}

public function getPostID() {
    return $this->post_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getSubject() {
    return $this->subject;
}

public function getText() {
    return $this->text;
}

public function setPostID($post_id)
{
    if($post_id === NULL) {
        $this->post_id = NULL;
        return;
     }
 
    $this->post_id = $post_id;
}

public function setUserName($user_name)
{
    if($user_name === NULL) {
        $this->user_name = NULL;
        return;
     }
 
    $this->user_name = $user_name;
}

public function setSubject($subject)
{
    if($subject === NULL) {
        $this->subject = NULL;
        return;
     }
 
    $this->subject = $subject;
}

public function setText($text)
{
    if($text === NULL) {
        $this->text = NULL;
        return;
     }
 
    $this->text = $text;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Post save');
    }

        $stt = $pdo->prepare('INSERT INTO posts (user_name, subject, text) VALUES (:user_name, :subject, :text)');
        $stt->execute([
            'user_name' => $this->getUserName(),
            'subject' => $this->getSubject(),
            'text' => $this->getText()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}

public function findAll($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Post findAll');
    }

    $stt = $pdo->prepare('SELECT post_id, user_name, subject, text FROM posts');
    $stt->execute();

    return $stt;
}

public function displayPost(){
     echo('hello');
     ?>
     
<div class="card-body">
    <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
        <a class="card-link" href="#">
        <h5 class="card-title"><?=$this->getUserName()?></h5>
        </a>
        <h6 class="card-title"><?=$this->getSubject()?></h6>

        <p class="card-text">
        <?=$this->getText()?>
        </p>
    </div>
    <div class="card-footer">
        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>
</div>
    <?php
    }
}

?>