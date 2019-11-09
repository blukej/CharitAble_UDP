<?php return function($req, $res) {

    require_once('./models/Post.php');
    require_once('./models/Login.php');
    require_once('./models/Following.php');

    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }
    
    $user_name = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    $db = \Rapid\Database::getPDO();

    $posts = Post::findAll($db);
    $users = Login::findAllUsers($db);
    $follows = Following::findAllFollows($user_name,$db);
    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'displayPosts' => $posts->fetchAll(),
        'displayUsers' => $users->fetchAll(),
        'displayFollows' => $follows->fetchAll()
    ]);
    
} ?>