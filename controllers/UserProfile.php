<?php return function($req, $res) {

require_once('./models/User.php');

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

$profile = User::findOneByUsernameProfile($user_name, $db);

$res->render('main', 'profile', [
    'message' => $req->query('success')? 'Successful!': '',
    'user_type' => $user_type,
    'user_name' => $user_name,
    'userProfile' => $profile->fetchAll()
]);

} ?>