<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');
  define('APP_BASE_URL', '/charitable_udp');
  //$APP_BASE_URL = function($req, $res) {
  //  $config = \Rapid\ConfigFile::getContent();
    //return $config['charitable_udp'];
  //};
  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',                  'Home'); 
  $app->GET('/example',           'Example');
  $app->GET('/Login',             'Login');
  $app->GET('/Register',          'Register');
  $app->GET('/RegisterCharity',   'RegisterCharity');
  $app->GET('/Posts',             'Posts');
  $app->POST('/Login',            'LoginProcess');
  $app->POST('/Register',         'RegisterProcess');
  $app->POST('/RegisterCharity',  'RegisterCharityProcess');
  $app->POST('/PostProcess',      'PostProcess');

  // Process the request
  $app->dispatch();

?>