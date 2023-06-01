<?php
Flight::route('GET /service', function(){
  Flight::json(Flight::serviceService()->select_all());
});

Flight::route('GET /service/@id', function($id){
  Flight::json(Flight::serviceService()->select_by_id($id));
});

Flight::route('POST /service', function(){
  Flight::json(Flight::serviceService()->add(Flight::request()->data->getData()));
});

Flight::route('DELETE /service/@id', function($id){
  Flight::serviceService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::route('PUT /service/@id', function($id){
  $service = Flight::request()->data->getData();
  Flight::serviceService()->update($id, $service);
  Flight::json(["message" => "updated"]);
});
?>