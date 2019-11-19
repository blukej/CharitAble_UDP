<?php return function($req, $res) {
  $req->sessionStart();
  require_once('./models/User.php');
  require_once('./models/Following.php');
  $db = \Rapid\Database::getPDO();
 

  $charities = User::findAllCharities($db);
  

  $res->render('main', 'example', [
  'title'         => 'Home',
  'charities'     => $charities->fetchAll()
  ]);

} ?>