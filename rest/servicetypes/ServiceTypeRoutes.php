<?php 
Flight::route('GET /servicetype', function(){
    Flight::json(Flight::serviceTypeService()->select_all());
  });
  
  Flight::route('GET /servicetype/@id', function($id){
    Flight::json(Flight::serviceTypeService()->select_by_id($id));
  });
  
  Flight::route('POST /servicetype', function(){
    Flight::json(Flight::serviceTypeService()->add(Flight::request()->data->getData()));
  });
  
  Flight::route('DELETE /servicetype/@id', function($id){
    Flight::serviceTypeService()->delete($id);
    Flight::json(["message" => "deleted"]);
  });
  
  Flight::route('PUT /servicetype/@id', function($id){
    $serviceType = Flight::request()->data->getData();
    Flight::serviceTypeService()->update($id, $serviceType);
    Flight::json(["message" => "updated"]);
  });
  
?>