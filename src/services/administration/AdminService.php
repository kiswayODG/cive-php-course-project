<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class AdminService
{
   private Connection $conect;
   private UserRepository $userRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
   }

   public function index(){
      // all process about index view can be do here
      
      include('src/views/administration/admin_home.php');
   }

   public function showUsers(){

    include('src/views/administration/users.php');
   }
   public function createUserFromForm(): void
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $user = new User();
         $user->setId($_POST["id"]);
         $user->setUsername($_POST["uname"]);
         $user->setEmail($_POST["email"]);
         $user->setPassword(password_hash($_POST["pass"], PASSWORD_DEFAULT));

         if (!empty($user->getId())) {
            $this->userRepo->updateUser($user);
        } else {
            $this->userRepo->saveUser($user);
        }
        
         header('Location: /user/profile.php'); 
         exit();
      } else {
         include 'views/create_user_form.php';
      }
   }

   // ...
}
