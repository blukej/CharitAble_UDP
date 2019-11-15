<?php return function($req, $res) {

  session_start();

  $res->render('main', 'example', [
  'someLocalKey' => 'Hello There',
  'title'   => 'Home'
  ]);

} ?>