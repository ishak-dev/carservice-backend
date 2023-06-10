<?php
Flight::route('GET /vehicle', function(){
    Flight::json(Flight::vehicleService()->select_all());
  });
  
  Flight::route('GET /vehicle/@id', function($id){
    Flight::json(Flight::vehicleService()->select_by_id($id));
  });
  Flight::route('GET /vehicle/user/@id', function($id){
    Flight::json(Flight::vehicleService()->select_by_customer_id($id));
  });
  Flight::route('POST /vehicle', function(){
    Flight::json(Flight::vehicleService()->add(Flight::request()->data->getData()));
  });
  
  Flight::route('DELETE /vehicle/@id', function($id){
    Flight::vehicleService()->delete($id);
    Flight::json(["message" => "deleted"]);
  });
  
  Flight::route('PUT /vehicle/@id', function($id){
    $vehicle = Flight::request()->data->getData();
    Flight::vehicleService()->update($id, $vehicle);
    Flight::json(["message" => "updated"]);
  });
  
?>