<?php 
    session_start();
class Post {

private $post_id;
private $user_name;
private $title;
private $text;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Post constructor requires an array');
    }

    $this->setPostID($args['post_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setTitle($args['title'] ?? NULL);
    $this->setText($args['text'] ?? NULL);
}

public function getPostID() {
    return $this->post_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getTitle() {
    return $this->title;
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

public function setTitle($title)
{
    if($title === NULL) {
        $this->title = NULL;
        return;
     }
 
    $this->title = $title;
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

        $stt = $pdo->prepare('INSERT INTO posts (user_name, subject, text) VALUES (:user_name, :title, :text)');
        $stt->execute([
            'user_name' => $this->getUserName(),
            'title' => $this->getTitle(),
            'text' => $this->getText()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}
}