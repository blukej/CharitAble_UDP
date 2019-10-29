<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');

  $APP_BASE_URL = function($req, $res) {
    $config = \Rapid\ConfigFile::getContent();
    return $config['APP_BASE_URL'];
  };
  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',        'Home');
  $app->GET('/example', 'Example');

  // Process the request
  $app->dispatch();

?>