<?php return function($req, $res) { require_once('./models/Following.php'); 

session_start();

$db = \Rapid\Database::getPDO();

$user = new Following([
    'user_name' => $req->body('user_name'),
    'follow_user_name' => $req->body('follow_user_name')
]);

$user->follow($db);

$res->redirect("/Posts");

}?>