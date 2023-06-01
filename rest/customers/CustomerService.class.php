
<?php
require_once '../BaseService.class.php';

class CustomerService extends BaseService{

  public function __construct(){
    parent::__construct(new CustomerDao());
  }

}
?>
