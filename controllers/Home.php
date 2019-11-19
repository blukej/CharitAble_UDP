<?php return function($req, $res) {
  $req->sessionStart();
  require_once('./models/User.php');
  require_once('./models/Following.php');
  $db = \Rapid\Database::getPDO();
 

  $charities = User::findAllCharities($db);
  $follow = new Following($_SESSION);
  
  $followed = $follow->findAllFollows($db);

  $res->render('main', 'example', [
  'title'         => 'Home',
  'charities'     => $charities->fetchAll(),
  'user_name'     => $req->session('user_name'),
  'followed'      => $followed
  ]);

} ?>