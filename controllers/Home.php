<?php return function($req, $res) {
  session_start();

$res->render('main', 'home', [
  'someLocalKey' => 'Hello There',
  'title'   => 'Home'
]);

} ?>