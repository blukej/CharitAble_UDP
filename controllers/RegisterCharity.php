<?php return function($req, $res) {
    
    $req->sessionStart();

    $res->render('main', 'registerCharity', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>