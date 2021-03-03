<?php

ini_set('display_errors',1);

session_start();

require '../../framework/vendor/autoload.php';
require '../../framework/core/bootstrap.php';


use App\Core\{Router, Request};
try{

Router::load('../../framework/app/routes.php')
    ->direct(Request::uri(), Request::method());
	
	
} catch(Exception $e) {
 require('../../framework/app/views/partials/head.php');
 echo $e->getMessage();
 
}
