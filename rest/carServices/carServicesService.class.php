<?php

require_once __DIR__.'/carServicesDao.class.php';

class carServicesService{
  private $dao;
  public function __construct(){
    $this->dao=new carServiceDao();
  }

  public function getAllCarServices(){
    return $this->dao->getAllCarServices();
  }
}
