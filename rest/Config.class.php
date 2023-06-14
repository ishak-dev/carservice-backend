<?php

 class Config {

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "sql7.freemysqlhosting.net");
  }
  public static function DB_USERNAME(){
    return Config::get_env("DB_USERNAME", "sql7624555");
  }
  public static function DB_PASSWORD(){
    return Config::get_env("DB_PASSWORD", "XDGelN9MuU");
  }
  public static function DB_SCHEME(){
    return Config::get_env("DB_SCHEME", "sql7624555");
  }
  public static function DB_PORT(){
    return Config::get_env("DB_PORT", "3306");
  }


  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>
