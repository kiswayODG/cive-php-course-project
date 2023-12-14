<?php


require_once('src/model/Course.php');
require_once('src/repository/LanguageRepository.php');
require_once('src/repository/CourseRepository.php');
require_once('src/repository/NewRepository.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class CourseService
{
   private  $conect;
 
   private  $courseRepo;
   private $languageRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->courseRepo = new CourseRepository($this->conect->conn());
      $this->languageRepo = new LanguageRepository($this->conect->conn());
   }


   public function showCourse()
   { 
      $courses = $this->courseRepo->getCourseAll();
      $languages = $this->languageRepo->getAllLanguages();
      include_once('src/views/administration/courses.php');
   }

   public function getCourse($id)
   {

      $course = $this->courseRepo->getCourseId($id);
      $courseData = array(
         'id' => $course->getId(),
         'courseName' => $course->getCourseName(),
         'courseIntroduction' => $course->getCourseIntroduction(),
         'outline'=> $course->getOutline(),
        
      );
      http_response_code(200);
      header('Content-Type: application/json');
      echo json_encode($courseData);
   }

   public function deleteCourse()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
         $id = $_POST['id'];
         $course = $this->courseRepo->getCourseId($id);
         $this->courseRepo->deleteCourse($course);
      }
      $actionResult = "Class deleted with success !";
      $_SESSION['actionResult'] = $actionResult;
      header('Location: /admin/courses');
   }

   public function createCourseForm()
   {


      /*if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
         $course = new Course();
         $lang = new Language();
         $course->setCourseIntroduction($_POST["courseIntroduction"]);
         $course->setCourseName($_POST["coursename"]);
         $course->setOutline($_POST["outline"]);
         $lang->setId($_POST["language"]);
         $course->setLanguage($lang);

         $this->courseRepo->saveCourse($course);
         $actionResult = "Course " . $course->getCourseName() . " created with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/courses');
         exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "update") {

        $course = new Course();
       // $course->setId($_POST["id"]);
       $course->setCourseIntroduction($_POST["courseIntroduction"]);
       $course->setCourseName($_POST["courseName"]);
       $course->setOutline($_POST["outline"]);

         $this->courseRepo->updateCourse($course);
         $actionResult = "Class " . $course->getCourseName() . " updated with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/courses');
      }*/
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
       $course = new Course();
        $lang = new Language();
        $lang->setId($_POST["language"]);
        $course->setCourseName($_POST["coursename"]); 
        $course->setCourseIntroduction($_POST["courseIntroduction"]);
        $course->setOutline($_POST["outline"]);
        $course->setLanguage($lang);
       
        $this->courseRepo->saveCourse($course);
        $actionResult = "Courses " . $course->getCourseName() . " created with success !";
        $_SESSION['actionResult'] = $actionResult;
        header('Location: /admin/courses');
        exit();
     }
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "update") {

        $course = new Course();
        $lang = new Language();
        $lang->setId($_POST["language"]);
        $course->setId($_POST["course_id"]);
        $course->setCourseName($_POST["coursename"]);
        $course->setCourseIntroduction($_POST["courseIntroduction"]);
        $course->setOutline($_POST["outline"]);
        $course->setLanguage($lang);

        $this->courseRepo->updateCourse($course);
        $actionResult = "Courses " . $course->getCourseName() . " updated with success !";
        $_SESSION['actionResult'] = $actionResult;
        header('Location: /admin/courses');
     }

   }
}