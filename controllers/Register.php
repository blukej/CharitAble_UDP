<?php return function($req, $res) {
    
    $req->sessionStart();

    $res->render('main', 'register', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>