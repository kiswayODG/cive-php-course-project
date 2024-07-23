<?php


require_once('src/model/Course.php');
require_once('src/repository/LanguageRepository.php');
require_once('src/repository/CourseRepository.php');
require_once('src/repository/DocumentRepository.php');
require_once('src/repository/NewRepository.php');
require_once('src/repository/UserRepository.php');
require_once('common.config/Connection.php');

class CourseService
{
   private  $conect;

   private  $courseRepo;
   private $documentRepo;
   private $languageRepo;

   public function __construct()
   {
      $this->conect = new Connection();
      $this->courseRepo = new CourseRepository($this->conect->conn());
      $this->languageRepo = new LanguageRepository($this->conect->conn());
      $this->documentRepo = new DocumentRepository($this->conect->conn());
   }


   public function showCourse()
   {
       $courses = $this->courseRepo->getCourseAll();
       $documents = $this->documentRepo->getDocumentsAllWithoutCourse();
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
         'provider' => $course->getProvider(),
         'document' => ($course->getDocument() ? $course->getDocument()->getId() : null),
         'language' => ($course->getLanguage() ? $course->getLanguage()->getId() : null),
         'outline' => $course->getOutline(),

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

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "create") {
         $course = new Course();
         $lang = new Language();
         $doc = new Document();
         $doc->setId($_POST["document"]);
         $lang->setId($_POST["language"]);
         $course->setCourseName($_POST["coursename"]);
         $course->setCourseIntroduction($_POST["courseIntroduction"]);
         $course->setProvider($_POST["provider"]);
         $course->setDocument($doc);
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
         $doc = new Document();
         $doc->setId($_POST["document"]);
         $lang->setId($_POST["language"]);
         $course->setId($_POST["course_id"]);
         $course->setCourseName($_POST["coursename"]);
         $course->setCourseIntroduction($_POST["courseIntroduction"]);
         $course->setProvider($_POST["provider"]);
         $course->setDocument($doc);
         $course->setOutline($_POST["outline"]);
         $course->setLanguage($lang);

         $this->courseRepo->updateCourse($course);
         $actionResult = "Courses " . $course->getCourseName() . " updated with success !";
         $_SESSION['actionResult'] = $actionResult;
         header('Location: /admin/courses');
      }
   }

   
}
