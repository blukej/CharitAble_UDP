<?php return function($req, $res) { require_once('./models/User.php'); 

    session_start();

    $db = \Rapid\Database::getPDO();

    $user = new User([
        'user_name' => $req->body('username'),
        'charity_num' => $req->body('charitynumber'),
        'email' => $req->body('email'),
        'address' => $req->body('address'),
        'hash' => $req->body('password')
    ]);

    $user->charityRegister($db);

    $res->redirect("/Login");

}?>