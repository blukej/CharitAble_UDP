<?php return function($req, $res) {
    
    $req->sessionStart();

    $res->render('main', 'login', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>