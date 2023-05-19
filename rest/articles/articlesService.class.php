<?php

require_once __DIR__.'/articlesDao.class.php';

class usersService{
  private $dao;
  public function __construct(){
    $this->dao=new articlesDao();
  }

  public function getAllArticles(){
    return $this->dao->getAllArticles();
  }
}
