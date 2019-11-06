<?php return function($req, $res) {
    
    session_start();

    $res->render('main', 'registerCharity', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>