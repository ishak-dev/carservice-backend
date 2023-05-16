<?php

require_once __DIR__.'/usersDao.class.php';

class usersService{
  private $dao;
  public function __construct(){
    $this->dao=new UsersDao();
  }

  public function getAllUsers(){
    return $this->dao->getAllUsers();
  }
}
