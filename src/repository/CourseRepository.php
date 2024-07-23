<?php


require_once('src/model/Course.php');
require_once('src/model/Document.php');
require_once('src/repository/DocumentRepository.php');



class CourseRepository
{
    private  $pdo;
    private $languageRepo;
    private $documentRepo;



    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->languageRepo = new LanguageRepository($pdo);
        $this->documentRepo = new DocumentRepository($pdo);
    }

    public function getCourseAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses");
        $stmt->execute();
        $coursesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($coursesData as $courseData) {
            $courses[] = $this->rowMapper($courseData);
        }

        return $courses;
    }

    public function getCourseAllWithoutDoc()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE doc_id IS NULL");
        $stmt->execute();
        $coursesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses=[];
        foreach ($coursesData as $courseData) {
            $courses[] = $this->rowMapper($courseData);
        }

        return $courses;
    }

    public function saveCourse(Course $course)
    {
        $stmt = $this->pdo->prepare("INSERT INTO courses (`coursename`, `course_introduction`, `outline`, `language`,`provider`,`doc_id`) VALUES (?, ?, ?, ?,?,?)");
        $stmt->execute([$course->getCourseName(), $course->getCourseIntroduction(), $course->getOutline(), $course->getLanguage()->getId(), $course->getProvider(), $course->getDocument()->getId()]);
    }


    public function getCourseId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return $this->rowMapper($row);
    }

    public function updateCourse(Course $course): void
    {
        $stmt = $this->pdo->prepare("UPDATE courses SET `coursename` = ?, `course_introduction` = ?, `provider` = ?,`doc_id` = ?, `outline` = ?, `language` = ? WHERE id = ?");
        $stmt->execute([$course->getCourseName(), $course->getCourseIntroduction(), $course->getProvider(), $course->getDocument()->getId(), $course->getOutline(), $course->getLanguage()->getId(), $course->getId()]);
    }


    public function deleteCourse(Course $course)
    {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$course->getId()]);
    }

    public function getCourseByProvider($provider)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses where `provider`=?");
        $stmt->execute([$provider]);
        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $lang = new Language();
            $doc = new Document();
            $lang->setId($row['language']);
            $course = new Course();
            $course->setId($row['id']);
            $course->setCourseName($row['coursename']);
            $course->setCourseIntroduction($row['course_introduction']);
            $course->setLanguage($lang);
            $course->setOutline($row['outline']);
            $course->setProvider($row['provider']);
            $course->setDocument($doc);
            $courses[] = $course;
        }
        return $courses;
    }

    public  function rowMapper( $data)
    {
        $course = new Course();
        $course->setId($data['id']);
        $course->setCourseName($data['coursename']);
        $course->setCourseIntroduction($data['course_introduction']);
        $course->setProvider($data['provider']);
        $course->setOutline($data['outline']);

        if (isset($data['doc_id'])) {
            $document = $this->documentRepo->getDocumentById($data['doc_id']);
            $course->setDocument($document);
        }

        if (isset($data['language'])) {
            $language = new Language();
            $language->setId($data['language']);
            $course->setLanguage($language);
        }

        return $course;
    }

}
