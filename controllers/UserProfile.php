<?php return function($req, $res) {

    $req->sessionStart();

    require_once('./models/User.php');

    if($req->session('logged_in'))
    {
        $res->header('/Login');
    }

    $db = \Rapid\Database::getPDO();

    $profile = User::findOneByUsernameProfile($user_name, $db);

    $res->render('main', 'profile', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'userProfile' => $profile->fetchAll()
    ]);

} ?>