<?php
require_once __DIR__ ."/../vendor/autoload.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once __DIR__.'/users/usersService.class.php';

Flight::register('usersService','UsersService');





Flight::route('/', function(){
    echo 'hello world!';
});

require_once __DIR__ .'/users/usersRoutes.class.php';

Flight::start();
?>
