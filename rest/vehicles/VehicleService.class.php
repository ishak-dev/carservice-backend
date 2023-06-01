
<?php
require_once '../BaseService.class.php';

class VehicleService extends BaseService{

  public function __construct(){
    parent::__construct(new VehicleDao());
  }

}
?>
