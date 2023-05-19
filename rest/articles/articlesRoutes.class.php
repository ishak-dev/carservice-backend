<?php

Flight::route('GET /articles/',function(){
  Flight::json(Flight::articlesService()->getAllArticles());
});
//articlesService should be defined in flight register method in index.php


 ?>
