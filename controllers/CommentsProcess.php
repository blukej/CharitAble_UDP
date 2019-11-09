<?php require_once('./models/Comments.php'); ?>
<?php return function($req, $res) {

  session_start();

  $db = \Rapid\Database::getPDO();

  $post = new Comments([
    'post_id' => $req->body('displayPost'),
    'user_id' => $req->body('userid'),
    'user_name' => $req->body('username'),
    'text' => $req->body('comment'),
]);

  $post->save($db);

  $res->redirect("/Posts");

} ?>