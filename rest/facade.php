<?php
// Import necessary classes
require_once 'customers/CustomerService.class.php';
require_once 'services/ServiceService.class.php';
require_once 'servicetypes/ServiceTypeService.class.php';
require_once 'vehicles/VehicleService.class.php';
require_once 'appointments/AppointmentService.class.php';
require_once 'orders/OrderService.class.php';
require_once 'parts/PartService.class.php';

class BackendFacade {
    public static function registerServices() {
        Flight::register('customerService', 'CustomerService');
        Flight::register('serviceService', 'ServiceService');
        Flight::register('serviceTypeService', 'ServiceTypeService');
        Flight::register('vehicleService', 'VehicleService');
        Flight::register('appointmentService', 'AppointmentService');
        Flight::register('orderService', 'OrderService');
        Flight::register('partService', 'PartService');
    }

    public static function defineRoutes() {
        // Define routes using the services
        require_once __DIR__.'/customers/CustomerRoutes.php';
        require_once __DIR__.'/services/ServiceRoutes.php';
        require_once __DIR__.'/servicetypes/ServiceTypeRoutes.php';
        require_once __DIR__.'/vehicles/VehicleRoutes.php';
        require_once __DIR__.'/orders/OrderRoutes.php';
        require_once __DIR__.'/appointments/AppointmentRoutes.php';
        require_once __DIR__.'/parts/PartRoutes.php';
    }
}
