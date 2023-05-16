<?php
require_once __DIR__.'../../BaseDaoInstance.class.php';


class UsersDao extends BaseDao{
  public function __construct(){
    parent::__construct();
  }

  public function getAllUsers(){
     return "radi";
  }


}


?>
