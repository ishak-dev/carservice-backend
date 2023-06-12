<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/../BaseDao.class.php';

class ServiceDao extends BaseDao
{
  //constructor
  public function __construct()
  {
    parent::__construct("services");
  }

  public function select_by_user_id($id){
    return $this->query("SELECT * FROM services WHERE VehicleID = :id",["id"=>$id]);
  }
  public function getCarOwner($id){
    $stmt = $this->connection->prepare("SELECT * FROM vehicles WHERE CustomerId = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'];
  }
}
?>
