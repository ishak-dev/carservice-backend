
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/CustomerDao.class.php';


class CustomerService extends BaseService{

  public function __construct(){
    parent::__construct(new CustomerDao());
  }

}
?>
