<?php
Flight::route('GET /order', function(){
  Flight::json(Flight::orderService()->select_all());
});

Flight::route('GET /order/@id', function($id){
  Flight::json(Flight::orderService()->select_by_id($id));
});

Flight::route('POST /order', function(){
  Flight::json(Flight::orderService()->add(Flight::request()->data->getData()));
});

Flight::route('DELETE /order/@id', function($id){
  Flight::orderService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::route('PUT /order/@id', function($id){
  $order = Flight::request()->data->getData();
  Flight::orderService()->update($id, $order);
  Flight::json(["message" => "updated"]);
});

  
?>