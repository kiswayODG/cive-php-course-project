<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('src/repository/NewRepository.php');
require_once('src/repository/CourseRepository.php');
require_once('common.config/Connection.php');

class UserService
{
   private  $conect;
   private  $userRepo;
   private $newsRepo;
   private $coursesRepo;
   public $error = "";

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
      $this->newsRepo = new NewRepository($this->conect->conn());
      $this->coursesRepo = new CourseRepository($this->conect->conn());
   }

   public function index()
   {
      $recent_news =  $this->newsRepo->getRecentNews();
      include('src/home.php');
   }


   public function gallery()
   {
      include_once('src/views/gallery.php');
   }

   public function articles()
   {
      $articles = $this->newsRepo->getNewsAllByCat(1);
      include_once('src/views/article.php');
   }

   public function events()
   {
      $events = $this->newsRepo->getNewsAllByCat(2);
      include_once('src/views/event.php');
   }

   public function courses()
   {
      $sspucourses = $this->coursesRepo->getCourseByProvider('SSPU');
      $huaweiCourses = $this->coursesRepo->getCourseByProvider('Huawei');
      include_once("src/views/courses.php");
   }

   public function article_details($id)
   {
      $new = $this->newsRepo->getNewById($id);
      include_once("src/views/article-details.php");
   }

   public function course_details($id)
   {
      $course = $this->coursesRepo->getCourseId($id);
      include_once("src/views/course-details.php");
   }

   public function news_details()
   {

      include('src/news-details.php');
   }



   public function user_login()
   {

      include_once("src/views/administration/login_page.php");
   }

   public function login_check()
   {
      $password = $_POST["password"];
      $userData =  $this->userRepo->getUserByUsername($_POST["username"]);
      
       if($userData && ($password == $userData->getPassword())){
         $_SESSION["user_id"]=$userData->getId();
         $_SESSION["username"]=$userData->getUsername();
        header("Location: /admin/users"); }
        else{
         header("Location: /login");
        }

   }

   public function logOut()
   {
      session_destroy();
      session_start();
      header("Location: /login");
   }
}
