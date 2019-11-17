<?php require_once('./models/Comments.php'); ?>
<?php return function($req, $res) {

  session_start();

  $db = \Rapid\Database::getPDO();

  $post = new Comments([
    'post_id' => $req->body('post_id'),
    'user_name' => $req->body('user_name'),
    'text' => $req->body('text'),
  ]);

  $post->save($db);

  $res->redirect("/Posts");

} ?>