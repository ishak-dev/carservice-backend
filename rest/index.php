<?php
require_once __DIR__ ."/../vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers,Authorization');
header('Access-Control-Allow-Methods: GET,PUT, POST, PATCH, OPTIONS, DELETE');

// If this is a pre-flight request (the request method is OPTIONS)? Then flush the output buffer and exit.
if ($requestMethod === 'OPTIONS') {
    ob_end_flush();
    exit();
}
require_once 'facade.php';
//middleware method for login
Flight::route('/*',function(){
    //perform JWT decode
    $path = Flight::request()->url;
    if($path =='/userLogin') return TRUE;   //exclude login route from middleware
    $headers = getallheaders();
    
    if(@!$headers['Authorization']){
      Flight::json(["message" => "Authorization is missing"],403);
      return FALSE;
    }else {
      try {
        $decoded = (array)JWT::decode($headers['Authorization'],new Key('example_key','HS256'));
        Flight::set('user',$decoded);
        return TRUE;
      } catch (\Exception $e) {
        Flight::json(["message" => "Authorization token is not valid"],403);
        return FALSE;
      }
  
    }
    print_r($headers);
  });


$facade = new BackendFacade();
$facade->registerServices();
$facade->defineRoutes();


Flight::route('/', function(){
    Flight::json(Flight::customerService()->select_all());
});


Flight::start();
?>
