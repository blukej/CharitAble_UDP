<?php return function($req, $res) {

    $req->sessionStart();

    require_once('./models/Post.php');
    require_once('./models/User.php');
    require_once('./models/Following.php');
    require_once('./models/Comments.php');


    
    $user_name = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }

    if(empty($_SESSION['USERNAME'])) {
        $user_name = '';
    }

    $db = \Rapid\Database::getPDO();

    $sortedPosts = Post::findAllSortByDate($db);
    $comments = Comments::findAll($db);

    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_name' => $user_name,
        'displayPosts' => $sortedPosts->fetchAll(),
        'userComments' => $comments->fetchAll(),
    ]);
    
} ?>