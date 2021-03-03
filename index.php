<?php

ini_set('display_errors',1);

session_start();

require './vendor/autoload.php';
require './core/bootstrap.php';


use App\Core\{Router, Request};
try{

Router::load('./app/routes.php')
    ->direct(Request::uri(), Request::method());
	
	
} catch(Exception $e) {
 require('./app/views/partials/head.php');
 echo $e->getMessage();
 
}
