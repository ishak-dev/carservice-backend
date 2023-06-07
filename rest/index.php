<?php
require_once __DIR__ ."/../vendor/autoload.php";
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

require_once 'customers/CustomerService.class.php';
require_once 'vehicles/VehicleService.class.php';
require_once 'services/ServiceService.class.php';
require_once 'servicetypes/ServiceTypeService.class.php';
require_once 'orders/OrderService.class.php';
require_once 'parts/PartService.class.php';
require_once 'appointments/AppointmentService.class.php';


Flight::register('customerService','CustomerService');
Flight::register('serviceService','ServiceService');
Flight::register('serviceTypeService','ServiceTypeService');
Flight::register('vehicleService','VehicleService');
Flight::register('appointmentService','AppointmentService');
Flight::register('orderService','OrderService');
Flight::register('partService','PartService');


require_once __DIR__.'/customers/CustomerRoutes.php';
require_once __DIR__.'/services/ServiceRoutes.php';
require_once __DIR__.'/servicetypes/ServiceTypeRoutes.php';
require_once __DIR__.'/vehicles/VehicleRoutes.php';
require_once __DIR__.'/orders/OrderRoutes.php';
require_once __DIR__.'/appointments/AppointmentRoutes.php';
require_once __DIR__.'/parts/PartRoutes.php';





Flight::route('/', function(){
    Flight::json(Flight::customerService()->select_all());
});


Flight::start();
?>
