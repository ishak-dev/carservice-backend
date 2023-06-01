<?php
require_once __DIR__ ."/../vendor/autoload.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once 'customers/CustomerService.class.php';
require_once 'vehicles/VehicleService.class.php';
require_once 'services/ServiceService.class.php';
require_once 'servicetypes/ServiceTypeService.class.php';


Flight::register('customerService','CustomerService');
Flight::register('serviceService','ServiceService');
Flight::register('serviceTypeService','ServiceTypeService');
Flight::register('vehicleService','VehicleService');

require_once __DIR__.'/customers/CustomerRoutes.php';
require_once __DIR__.'/services/ServiceRoutes.php';
require_once __DIR__.'/servicetypes/ServiceTypeRoutes.php';
require_once __DIR__.'/vehicles/VehicleRoutes.php';





Flight::route('/', function(){
    Flight::json(Flight::customerService()->select_all());
});


Flight::start();
?>
