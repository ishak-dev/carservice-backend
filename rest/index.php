<?php
require_once __DIR__ ."/../vendor/autoload.php";
require_once 'facade.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);




$requestMethod = $_SERVER['REQUEST_METHOD'];

// Is this a pre-flight request (the request method is OPTIONS)? Then start output buffering.
if ($requestMethod === 'OPTIONS') {
    ob_start();
}

// Allow for all origins and credentials. Also allow GET, POST, PATCH, and OPTIONS request verbs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS, DELETE');

// If this is a pre-flight request (the request method is OPTIONS)? Then flush the output buffer and exit.
if ($requestMethod === 'OPTIONS') {
    ob_end_flush();
    exit();
}


$facade = new BackendFacade();
$facade->registerServices();
$facade->defineRoutes();


Flight::route('/', function(){
    Flight::json(Flight::customerService()->select_all());
});


Flight::start();
?>
