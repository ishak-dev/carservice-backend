
<?php
require_once '../BaseService.class.php';

class ServiceTypeService extends BaseService{

  public function __construct(){
    parent::__construct(new ServiceTypeDao());
  }

}
?>
