<?php


require_once('src/model/NewClass.php');
require_once('src/repository/ClassRepository.php');
require_once('src/repository/NewRepository.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class AdminNewsService
{
   private Connection $conect;
   private ClassRepository $classRepo;
   private NewRepository $newsRepo;
   private UserRepository $userRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->classRepo = new ClassRepository($this->conect->conn());
      $this->newsRepo = new NewRepository($this->conect->conn());
      $this->userRepo = new UserRepository($this->conect->conn());

   }


   public function showNewsClass()
   {
      
      $classes = $this->classRepo->getNewsClassAll();
      include_once('src/views/administration/newsclass.php');
   }

   public function getNewsClass($id)
   {

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

   public function deleteNewsClass()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['class_id']) {
         $id = $_POST['class_id'];
         $class = $this->classRepo->getClassById($id);
         $this->classRepo->deleteClass($class);
      }
      $actionResult = "Class deleted with success !";
      $_SESSION['actionResult'] = $actionResult;
      header('Location: /admin/news-class');
   }

   public function createNewsClassFromForm()
   {


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

   // news-------------------------------------------

   public function showNews()
   {

      $news = $this->newsRepo->getNewsAll();
      $users = $this->userRepo->getUserAll();
      $classes = $this->classRepo->getNewsClassAll();
      include_once('src/views/administration/news.php');
   }

   public function getNews($id)
   {

      $news = $this->newsRepo->getNewById($id);
      $newsData = array(
         'id' => $news->getId(),
         'title' => $news->getTitle(),
         'author' => $news->getAuthor()->getId(),
         'pubdate' => $news->getPubDate(),
         'content' => $news->getContent(),
         'newclass' => $news->getNewClass()->getId(),
         'language' => $news->getLanguage()->getId(),
      );
      http_response_code(200);
      header('Content-Type: application/json');
      echo json_encode($newsData);
   }

   public function deleteNews()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['news_id']) {
         $id = $_POST['news_id'];
         $news = $this->newsRepo->getNewById($id);
         $this->newsRepo->deleteNews($news);
      }
      $actionResult = "News deleted with success !";
      $_SESSION['actionResult'] = $actionResult;
      header('Location: /admin/news');
   }


   public function createNewsFromForm(){

      
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
         $news = new News();
         $lang = new Language();
         $lang->setId($_POST["language"]);
         $news->setTitle($_POST["title"]);
         $news->setAuthor($this->userRepo->getUserById($_POST["author"]));
         $news->setPubDate($_POST["pubdate"]);
         $news->setContent($_POST["content"]);
         $news->setNewClass($this->classRepo->getClassById($_POST["newclass"]));
         $news->setLanguage($lang);
        
         $this->newsRepo->saveNew($news);
         $actionResult = "News " . $news->getTitle() . " created with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/news');
         exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "update") {

         $news = new News();
         $lang = new Language();
         $lang->setId($_POST["language"]);
         $news->setId($_POST["news_id"]);
         $news->setTitle($_POST["title"]);
         $news->setAuthor($this->userRepo->getUserById($_POST["author"]));
         $news->setPubDate($_POST["pubdate"]);
         $news->setContent($_POST["content"]);
         $news->setNewClass($this->classRepo->getClassById($_POST["newclass"]));
         $news->setLanguage($lang);

         $this->newsRepo->updateNews($news);
         $actionResult = "News " . $news->getTitle() . " updated with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/news');
      }

   }
}
