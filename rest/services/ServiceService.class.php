
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/ServiceDao.class.php';


class ServiceService extends BaseService{

  public function __construct(){
    parent::__construct(new ServiceDao());
  }

}
?>
