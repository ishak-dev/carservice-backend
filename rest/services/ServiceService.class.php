
<?php
require_once '../BaseService.class.php';

class ServiceService extends BaseService{

  public function __construct(){
    parent::__construct(new ServiceDao());
  }

}
?>
