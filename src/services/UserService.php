<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('src/repository/NewRepository.php');
require_once('common.config/Connection.php');

class UserService
{
   private  $conect;
   private  $userRepo;
   private $newsRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
      $this->newsRepo = new NewRepository($this->conect->conn());

   }

   public function index(){
      $recent_news =  $this->newsRepo->getRecentNews();
      include('src/home.php');
   }

   public function news_details(){

      include('src/news-details.php');
   }
  
}
