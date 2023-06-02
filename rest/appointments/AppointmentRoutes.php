<?php
Flight::route('GET /appointment', function(){
  Flight::json(Flight::appointmentService()->select_all());
});

Flight::route('GET /appointment/@id', function($id){
  Flight::json(Flight::appointmentService()->select_by_id($id));
});

Flight::route('POST /appointment', function(){
  Flight::json(Flight::appointmentService()->add(Flight::request()->data->getData()));
});

Flight::route('DELETE /appointment/@id', function($id){
  Flight::appointmentService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::route('PUT /appointment/@id', function($id){
  $appointment = Flight::request()->data->getData();
  Flight::appointmentService()->update($id, $appointment);
  Flight::json(["message" => "updated"]);
});

?>