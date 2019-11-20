<?php

  $req->sessionStart();

  session_destroy();
  $_SESSION = [];

  $res->redirect("/");

?>