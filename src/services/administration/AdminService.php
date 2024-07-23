<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class AdminService
{
   private  $conect;
   private  $userRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
   }

   public function index()
   {
      // all process about index view can be do here

      include('src/views/administration/admin_home.php');
   }

   public function showUsers()
   {
      $users = $this->userRepo->getUserAll();
      include_once('src/views/administration/users.php');
   }

   public function createUserFromForm(): void
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
         $user = new User();
         $user->setUsername($_POST["uname"]);
         $user->setEmail($_POST["email"]);
         $user->setPassword($_POST["password"]);
         echo $user->getPassword();
         $this->userRepo->saveUser($user);
         $actionResult = "User " . $user->getUsername() . " created with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/users');
         exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "update") {

         $user = new User();
         $user->setId($_POST["user_id"]);
         $user->setUsername($_POST["uname"]);
         $user->setEmail($_POST["email"]);

         $this->userRepo->updateUser($user);
         $actionResult = "User " . $user->getUsername() . " updated with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/users');
      }
   }

   public function deleteUser()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['user_id']) {
         $id = $_POST['user_id'];
         $user = $this->userRepo->getUserById($id);
         $this->userRepo->deleteUser($user);
      }
      $actionResult = "User deleted with success !";
      $_SESSION['actionResult'] = $actionResult;
      header('Location: /admin/users');
   }

   public function getUser($id)
   {
      $user = $this->userRepo->getUserById($id);
      $userData = array(
         'id' => $user->getId(),
         'username' => $user->getUsername(),
         'email' => $user->getEmail(),
      );
      http_response_code(200);
      header('Content-Type: application/json');
      echo json_encode($userData);
   }

}
