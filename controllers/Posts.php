<?php return function($req, $res) {

    session_start();

    require_once('./models/Post.php');
    require_once('./models/Login.php');
    require_once('./models/Following.php');
    require_once('./models/Comments.php');


    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }
    
    $user_name = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    if(empty($_SESSION['USERNAME'])) {
        $user_name = '';
    }

    $db = \Rapid\Database::getPDO();

    $posts = Post::findAll($db);
    $users = Login::findAllUsersForOneUser($user_name,$db);
    $follows = Following::findAllFollows($user_name,$db);
    $comments = Comments::findAll($db);

    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'displayPosts' => $posts->fetchAll(),
        'displayUsers' => $users->fetchAll(),
        'displayFollows' => $follows->fetchAll(),
        'userComments' => $comments->fetchAll() 
    ]);
    
} ?>