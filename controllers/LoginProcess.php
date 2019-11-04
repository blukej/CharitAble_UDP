<?php return function($req, $res) { require_once('./models/Login.php'); 

session_start();

$db = \Rapid\Database::getPDO();

$user = new Login([
    'user_name' => $req->body('username'),
    'email' => $req->body('email'),
    'hash' => $req->body('password')
]);

$user->login($db);

$res->redirect("/");

}?>