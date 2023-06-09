
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/VehicleDao.class.php';


class VehicleService extends BaseService{

  public function __construct(){
    parent::__construct(new VehicleDao());
  }
  public function select_by_customer_id(){
    return $this->dao->select_by_customer_id(Flight::get('user')["id"]);
  }

}
?>
