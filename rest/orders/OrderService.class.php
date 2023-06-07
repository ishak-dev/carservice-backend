
<?php
require_once __DIR__.'/../BaseService.class.php';
require_once __DIR__.'/OrderDao.class.php';


class OrderService extends BaseService{

  public function __construct(){
    parent::__construct(new OrderDao());
  }
  public function select_by_customer_id($id){
    return $this->dao->select_by_customer_id($id);
  }
}
?>
