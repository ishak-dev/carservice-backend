
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/ServiceDao.class.php';


class ServiceService extends BaseService{

  public function __construct(){
    parent::__construct(new ServiceDao());
  }
  public function select_by_user_id(){
    $carId = $this->dao->getCarOwner(Flight::get("user")["id"]);
    $data["VehicleId"] = $carId;
    return $this->dao->select_by_user_id($carId);
  }
  public function addService($data){
    $carId = $this->dao->getCarOwner(Flight::get("user")["id"]);
    $data["VehicleId"] = $carId;
    return $this->dao->add($data);
  }
}
?>
