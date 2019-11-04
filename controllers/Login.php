<?php return function($req, $res) {
    
    session_start();

    $res->render('main', 'login', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>