<?php return function($req, $res) {
  session_start();
  require_once('./models/User.php');

  $db = \Rapid\Database::getPDO();

  $charities = User::findAllCharities($db);


  $res->render('main', 'example', [
  'title'        => 'Home',
  'charities'    => $charities->fetchAll()
  ]);

} ?>