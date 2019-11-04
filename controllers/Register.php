<?php return function($req, $res) {
    
    session_start();

    $res->render('main', 'register', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>