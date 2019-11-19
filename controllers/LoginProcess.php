<?php return function($req, $res) { require_once('./models/User.php'); 

    $req->sessionStart();

    $db = \Rapid\Database::getPDO();

    $user = new User([
        'user_name' => $req->body('username'),
        'email' => $req->body('email'),
        'hash' => $req->body('password')
    ]);

    $user = $user->login($db);
    $req->sessionSet('logged_in', TRUE);
    $req->sessionSet('user', $user);
    $res->redirect("/");

}?>