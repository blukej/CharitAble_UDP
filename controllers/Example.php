<?php return function($req, $res) {
  session_start();

  $user_type = '';
  if(!empty($_SESSION['USERTYPE'])) {
    $user_type = $_SESSION['USERTYPE'];
  }
  
  $username = '';
  if(!empty($_SESSION['USERNAME'])) {
    $user_name = $_SESSION['USERNAME'];
  }

  $res->render('main', 'example', [
    'someLocalKey' => 'Some Local Value',
    'user_type' => $user_type,
    'user_name' => $user_name   
  ]);

} ?>