<?php return function($req, $res) {
  session_start();

    $res->render('main', 'example', [
      'message' => $req->query('success')? 'Successful!': '',
    ]);

} ?>