<?php require_once('./models/Comment.php'); ?>
<?php return function($req, $res) {

  session_start();

  $db = \Rapid\Database::getPDO();

  $post = new Comment([
    'user_name' => $req->body('username'),
    'user_id' => $req->body('userid'),
    'text' => $req->body('text'),
]);

  $post->save($db);

  $res->redirect("/Example");

} ?>