<?php require_once('./models/Post.php'); ?>
<?php return function($req, $res) {

  session_start();

  $db = \Rapid\Database::getPDO();

  $post = new Post([
    'user_name' => $req->body('username'),
    'title' => $req->body('title'),
    'post' => $req->body('post_content')
]);

  $post->save($db);

  $res->redirect("/Example");

} ?>