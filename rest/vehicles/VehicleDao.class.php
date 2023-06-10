<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/../BaseDao.class.php';

class VehicleDao extends BaseDao
{
  //constructor
  public function __construct()
  {
    parent::__construct("vehicles");
  }
  public function select_by_customer_id($id){
    return $this->query("SELECT * FROM vehicles WHERE CustomerId = :id",["id"=>$id]);
  }
}
?>
