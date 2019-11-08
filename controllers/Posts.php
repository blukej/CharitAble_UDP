<?php return function($req, $res) {

    require_once('./models/Post.php');
    require_once('./models/Login.php');

    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }
    
    $user_name = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    $user_id  = '';
    if(!empty($_SESSION['USERID'])) {
        $user_id = $_SESSION['USERID'];
    }

    $db = \Rapid\Database::getPDO();

    $posts = Post::findAll($db);
    $users = Login::findAllUsers($db);
    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'user_id'   => $user_id,
        'displayPosts' => $posts->fetchAll(),
        'displayUsers' => $users->fetchAll() 
    ]);
    
} ?>