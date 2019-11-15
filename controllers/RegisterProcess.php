<?php return function($req, $res) { require_once('./models/Login.php'); 

    session_start();

    $db = \Rapid\Database::getPDO();

    $user = new Login([
        'user_name' => $req->body('username'),
        'email' => $req->body('email'),
        'address' => $req->body('address'),
        'hash' => $req->body('password')
    ]);

    $user->register($db);

    $res->redirect("/Login");

}?>