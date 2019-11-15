<?php return function($req, $res) {

    session_start();

    require_once('./models/Login.php');

    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }

    $username = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    if(empty($_SESSION['USERNAME'])) {
        header('Location: Login');
        exit();
    }

    $db = \Rapid\Database::getPDO();

    $profile = Login::findOneByUsernameProfile($user_name, $db);

    $res->render('main', 'profile', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'userProfile' => $profile->fetchAll()
    ]);

} ?>