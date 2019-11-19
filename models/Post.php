<?php 
class Post {

private $post_id;
private $user_name;
private $email;
private $subject;
private $text;
private $timestamp;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Post constructor requires an array');
    }

    $this->setPostID($args['post_id'] ?? NULL);
    $this->setUserName($args['user_name'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setSubject($args['subject'] ?? NULL);
    $this->setText($args['text'] ?? NULL);
}

public function getPostID() {
    return $this->post_id;
}

public function getUserName() {
    return $this->user_name;
}

public function getEmail() {
    return $this->email;
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

public function getSubject() {
    return $this->subject;
}

public function getText() {
    return $this->text;
}

public function getTimeStamp() {
    return $this->timestamp;
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

        $stt = $pdo->prepare('INSERT INTO posts (user_name, email, subject, text) VALUES (:user_name, :email, :subject, :text)');
        $stt->execute([
            'user_name' => $this->getUserName(),
            'email' => $this->getEmail(),
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

    $stt = $pdo->prepare('SELECT post_id, user_name, email, subject, text, post_date FROM posts');
    $stt->execute();

    return $stt;
}

public function findAllSortByDate($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Post findAll');
    }

    $stt = $pdo->prepare('SELECT post_id, user_name, email, subject, text, post_date FROM posts ORDER BY post_date DESC');
    $stt->execute();

    return $stt;
}

public function displayPost(){
     ?>
          <div class="card CA-card col">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?=$this->getUserName()?></div>
                                    <div class="h7 text-muted"><?=$this->getSubject()?></div>
                                </div>

                            </div>
                            <div>
                            </div>
                            <form action="https://www.paypal.com/cgi-bin/webscr/<?=$this->getEmail()?>" method="post" target="_top" class="text-right">
                                <input type="hidden" name="cmd" value="_donations" />
                                <input type="hidden" name="business" value="<?=$this->getEmail()?>" />
                                <input type="hidden" name="currency_code" value="EUR" />
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                                <img alt="" border="0" src="https://www.paypal.com/en_IE/i/scr/pixel.gif" width="1" height="1" />
                                </form>
                        </div>

                    </div>
                    <div class="card-body">
                        <P class="col-2">

                        </P>
                        <p class="card-text col-8">
                            <?=$this->getText()?>
                        </p>
                        <p class="col-2">
                            
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i>Comment</a>
                    </div>
                </div>
    <?php
    }
}

?>