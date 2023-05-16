<?php

Flight::route('GET /article/',function(){
  Flight::json(Flight::usersService()->getAllUsers());
});



 ?>
