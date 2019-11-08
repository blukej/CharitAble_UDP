<?php return function($req, $res) { require_once('./models/Following.php'); 

session_start();

$db = \Rapid\Database::getPDO();

$user = new Following([
    'user_id' => $req->body('user_id'),
    'follower_id' => $req->body('follower_id')
]);

$user->follow($db);

$res->redirect("/Posts");

}?>