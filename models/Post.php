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
     ?>
     
<div class="row">
  <div class="span8">
    <div class="row">
      <div class="span8">
        <h4><strong><a href="#"><?=$this->getSubject()?></a></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="span2">
        <a href="#" class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
        </a>
      </div>
      <div class="span6">      
        <p>
            <?=$this->getText()?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="span8">
        <p></p>
        <p>
          <i class="icon-user"></i> by <a href="#"><?=$this->getUserName()?></a> 
          | <i class="icon-comment"></i> <a href="#"></a>
          | <i class="icon-share"></i> <a href="#">39 Shares</a>
          | <i class="icon-tags"></i> Tags : <a href="#"><span class="label label-info">Snipp</span></a> 
          <a href="#"><span class="label label-info">Bootstrap</span></a> 
          <a href="#"><span class="label label-info">UI</span></a> 
          <a href="#"><span class="label label-info">growth</span></a>
        </p>
      </div>
    </div>
  </div>
</div>
    <?php
    }
}

?>