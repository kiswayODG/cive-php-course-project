<?php


require_once('src/model/NewClass.php');
require_once('src/repository/ClassRepository.php');
require_once('common.config/Connection.php');

class AdminNewsService
{
   private Connection $conect;
   private ClassRepository $classRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->classRepo = new ClassRepository($this->conect->conn());
   }


   public function showNewsClass(){

      $classes = $this->classRepo->getNewsClassAll();
      include_once('src/views/administration/newsclass.php');

   }

   public function getNewsClass($id) {

      $class = $this->classRepo->getClassById($id);
      $classData = array(
         'id' => $class->getId(),
         'cname' => $class->getClassName(),
         'desc' => $class->getDescription(),
      );
      http_response_code(200);
      header('Content-Type: application/json');
      echo json_encode($classData);

   }

   public function deleteNewsClass(){

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['class_id']) {
         $id = $_POST['class_id'];
         $class = $this->classRepo->getClassById($id);
         $this->classRepo->deleteClass($class);
      }
      $actionResult = "Class deleted with success !";
      $_SESSION['actionResult'] = $actionResult;
      header('Location: /admin/news-class');

   }

   public function createNewsClassFromForm(){

      
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
         $class = new NewClass();
         $class->setClassName($_POST["cname"]);
         $class->setDescription($_POST["desc"]);
        
         $this->classRepo->saveNClass($class);
         $actionResult = "Class " . $class->getClassName() . " created with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/news-class');
         exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "update") {

         $class = new NewClass();
         $class->setId($_POST["class_id"]);
         $class->setClassName($_POST["cname"]);
         $class->setDescription($_POST["desc"]);

         $this->classRepo->updateClass($class);
         $actionResult = "Class " . $class->getClassName() . " updated with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/news-class');
      }

   }
}
