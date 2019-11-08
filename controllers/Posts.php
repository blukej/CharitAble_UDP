<?php return function($req, $res) {

    require_once('./models/Post.php');

    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }
    
    $username = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    $db = \Rapid\Database::getPDO();

    $posts = Post::findAll($db);

    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'displayPosts' => $posts->fetchAll()   
    ]);
    
} ?>