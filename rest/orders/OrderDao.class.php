<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/../BaseDao.class.php';

class OrderDao extends BaseDao
{
  //constructor
  public function __construct()
  {
    parent::__construct("orders");
  }

  public function select_by_customer_id($id){
    return $this->query("SELECT * FROM orders WHERE customer_id = :id",["id"=>$id]);
  }


}
?>
