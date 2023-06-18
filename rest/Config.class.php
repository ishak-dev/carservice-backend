<?php

 class Config {

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "db4free.net");
  }
  public static function DB_USERNAME(){
    return Config::get_env("DB_USERNAME", "carservicer");
  }
  public static function DB_PASSWORD(){
    return Config::get_env("DB_PASSWORD", "carservicer");
  }
  public static function DB_SCHEME(){
    return Config::get_env("DB_SCHEME", "carservice");
  }
  public static function DB_PORT(){
    return Config::get_env("DB_PORT", "3306");
  }


  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>
