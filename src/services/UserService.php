<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class UserService
{
   private  $conect;
   private  $userRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
   }

   public function index(){
      // all process about index view can be do here
      
      include('src/home.php');
   }
  
}
