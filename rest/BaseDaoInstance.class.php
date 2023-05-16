<?php

class BaseDao{
  private $conn;
  private $table_name;
  public function __construct(){

    $servername = "localhost";
    $username = "root";
    $password = "user";
    $schema = "carservice";
    $port = "3309";

    $this->conn = new PDO ("mysql:host=$servername;dbname=$schema;port=$port", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

}
?>
