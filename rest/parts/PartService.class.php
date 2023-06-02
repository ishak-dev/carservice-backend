
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/PartDao.class.php';


class PartService extends BaseService{

  public function __construct(){
    parent::__construct(new PartDao());
  }

}
?>
