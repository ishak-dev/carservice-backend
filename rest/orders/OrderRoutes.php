<?php


header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

Flight::route('GET /order', function(){
  Flight::json(Flight::orderService()->select_all());
});

Flight::route('GET /order/@id', function($id){
  Flight::json(Flight::orderService()->select_by_id($id));
});

Flight::route('GET /orders/user', function(){
  $id = Flight::get('user')['id'];

  Flight::json(Flight::orderService()->select_by_customer_id($id));
});

Flight::route('POST /order', function(){
  $data = Flight::request()->data->getData();
  $data["customer_id"] = Flight::get('user')["id"];
  Flight::json(Flight::orderService()->add($data));
});

Flight::route('DELETE /order/@id', function($id){
  Flight::orderService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::route('POST /order_update/@id', function($id){
  //$order = Flight::request()->data->getData();
  $order;
  $order["approved"]="true";
  Flight::orderService()->update($id, $order);
  Flight::json(["message" => "updated"]);
});

  
?>