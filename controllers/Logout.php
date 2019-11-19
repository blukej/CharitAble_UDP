<?php

  $req->sessionStart();

  session_destroy();
  $_SESSION = [];

  header('Location: Login');

?>