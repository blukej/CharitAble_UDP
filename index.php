<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');
  // DEFINE('BASE_DIR', ConfigFile::getContent()['APP_BASE_URL']);


  define('APP_BASE_URL', '/charitable_udp');
  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',                  'Home'); 
  $app->GET('/Example',           'Example');
  $app->GET('/Login',             'Login');
  $app->GET('/Logout',            'Logout');
  $app->GET('/Register',          'Register');
  $app->GET('/RegisterCharity',   'RegisterCharity');
  $app->GET('/Posts',             'Posts');
  $app->GET('/Comments',             'Comments');
  $app->POST('/Login',            'LoginProcess');
  $app->POST('/Register',         'RegisterProcess');
  $app->POST('/RegisterCharity',  'RegisterCharityProcess');
  $app->POST('/Posts',             'PostProcess');
  $app->POST('/Comments',             'CommentsProcess');

  // Process the request
  $app->dispatch();

?>