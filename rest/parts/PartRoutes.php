<?php
Flight::route('GET /part', function(){
    Flight::json(Flight::partService()->select_all());
  });
  
  Flight::route('GET /part/@id', function($id){
    Flight::json(Flight::partService()->select_by_id($id));
  });
  
  Flight::route('POST /part', function(){
    Flight::json(Flight::partService()->add(Flight::request()->data->getData()));
  });
  
  Flight::route('DELETE /part/@id', function($id){
    Flight::partService()->delete($id);
    Flight::json(["message" => "deleted"]);
  });
  
  Flight::route('PUT /part/@id', function($id){
    $part = Flight::request()->data->getData();
    Flight::partService()->update($id, $part);
    Flight::json(["message" => "updated"]);
  });
  
?>