<?php require_once('./models/Post.php'); ?>
<?php return function($req, $res) {

  $req->sessionStart();

  if(!$req->session('logged_in'))
    {
      $res->redirect("/Login");
    }
    else{
      $db = \Rapid\Database::getPDO();
    
      $post = new Post([
        'user_name' => $req->body('username'),
        'email' => $req->body('email'),
        'subject' => $req->body('subject'),
        'text' => $req->body('post')
      ]);
    
      $post->save($db);
    
      $res->redirect("/Posts");
    }

} ?>