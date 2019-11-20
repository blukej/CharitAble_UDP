<?php return function($req, $res) {

    $req->sessionStart();

    require_once('./models/User.php');

    if(!$req->session('logged_in'))
    {
        $res->redirect('/Login');
    }else{
        $db = \Rapid\Database::getPDO();
    
        $user = $req->session('user');
        $res->render('Loggedin', 'profile', [
            'user'    => $user
        ]);
    }

} ?>