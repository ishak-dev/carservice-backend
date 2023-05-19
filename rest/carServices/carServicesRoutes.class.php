<?php

Flight::route('GET /carservices/',function(){
  Flight::json(Flight::carServicesService()->getAllCarServices());
});



 ?>
