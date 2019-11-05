<?php return function($req, $res) {

$res->render('main', 'example', [
  'someLocalKey' => 'Hello There',
  'title'   => 'Home'
]);

} ?>