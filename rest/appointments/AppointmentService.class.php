
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/AppointmentDao.class.php';


class AppointmentService extends BaseService{

  public function __construct(){
    parent::__construct(new AppointmentDao());
  }
 

}
?>
