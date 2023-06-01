<?php

Flight::route('GET /customer', function(){
  Flight::json(Flight::customerService()->select_all());
});

Flight::route('GET /customer/@id', function($id){
  Flight::json(Flight::customerService()->select_by_id($id));
});

Flight::route('POST /customer', function(){
  Flight::json(Flight::customerService()->add(Flight::request()->data->getData()));
});

Flight::route('DELETE /customer/@id', function($id){
  Flight::customerService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::route('PUT /customer/@id', function($id){
  $customer = Flight::request()->data->getData();
  Flight::customerService()->update($id, $customer);
  Flight::json(["message" => "updated"]);
});

?>
