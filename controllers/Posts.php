<?php return function($req, $res) {
    
    session_start();

    $res->render('main', 'post', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>