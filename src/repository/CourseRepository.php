<?php


require_once('src/model/Course.php');



class CourseRepository
{
    private  $pdo;
    

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
     
    }

    public function getCourseAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM courses");
        $stmt->execute();
        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
            $lang = new Language();
            $lang->setId($row['language']);
            $course = new Course($row['id'],$row['coursename'],$row['course_introduction'],$row['outline'],$lang);
            $course->setId($row['id']);
            $courses[] = $course;
        }
        return $courses;
    }

    public function saveCourse(Course $course)
    {
        $stmt = $this->pdo->prepare("INSERT INTO courses (`coursename`, `course_introduction`, `outline`, `language`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$course->getCourseName(), $course->getCourseIntroduction(),$course->getOutline(),$course->getLanguage()->getId()]);
    }


    public function getCourseId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
           
            $lang = new Language();
            $lang->setId($row['language']);

            $course = new Course($row['id'],$row['coursename'],$row['course_introduction'],$row['outline'],$lang);
            
            return $course;
        }else{
            return null;
        }
    }

    public function updateCourse(Course $course): void
    {
        $stmt = $this->pdo->prepare("UPDATE courses SET `coursename` = ?, `course_introduction` = ?, `outline` = ?, `language` = ? WHERE id = ?");
        $stmt->execute([$course->getCourseName(),$course->getCourseIntroduction(),$course->getOutline(),$course->getLanguage()->getId(),$course->getId()]);
    }
   
   /* public function updateCourse(Course $course)
    {
        // Retrieve the existing document path
        $stmt = $this->pdo->prepare("SELECT `coursename` FROM courses WHERE id = ?");
        $stmt->execute([$course->getId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Remove the existing physical document file
            $existingDocumentPath = $row['coursename'];
            if (file_exists($existingDocumentPath)) {
                unlink($existingDocumentPath);
            }
        }

        // Update the database record with the new document information
        $stmt = $this->pdo->prepare("UPDATE courses SET `coursename` = ?, `course_introduction` = ?, , `outline` = ? `language` = ? WHERE id = ?");
        $stmt->execute([$course->getCourseName(), $course->getCourseIntroduction(), $course->getOutline(), $course->getLanguage()->getId()]);
    }
    */
    public function deleteCourse(Course $course)
    {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$course->getId()]);
    }

}
