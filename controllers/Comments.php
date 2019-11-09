<?php return function($req, $res) {
    
    session_start();

    $user_type = '';
    if(!empty($_SESSION['USERTYPE'])) {
        $user_type = $_SESSION['USERTYPE'];
    }
    
    $username = '';
    if(!empty($_SESSION['USERNAME'])) {
        $user_name = $_SESSION['USERNAME'];
    }
    
    $comments = Comments::findAll($db);

    $res->render('main', 'comments', [
        'message' => $req->query('success')? 'Successful!': '',
        'user_type' => $user_type,
        'user_name' => $user_name,
        'userComments' => $comments->fetchAll()
    ]);
    
} ?>