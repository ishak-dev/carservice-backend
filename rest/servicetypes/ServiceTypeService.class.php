
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/ServiceTypeDao.class.php';


class ServiceTypeService extends BaseService{

  public function __construct(){
    parent::__construct(new ServiceTypeDao());
  }

}
?>
