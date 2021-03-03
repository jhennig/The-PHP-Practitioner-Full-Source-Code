 <?php
 // $directory returns the directory of where the index.php script is executing
 $directory = basename(dirname($_SERVER['SCRIPT_NAME']))  ;
 
 
$router->get($directory . '', 'HomeController@home');
 
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');