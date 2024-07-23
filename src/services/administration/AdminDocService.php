<?php

require_once('src/model/Document.php');
require_once('src/repository/DocumentRepository.php');
require_once('src/repository/LanguageRepository.php');
require_once('src/repository/CourseRepository.php');
require_once('common.config/Connection.php');

class AdminDocService
{
    private $connect;
    private $documentRepo;
    private $languageRepo;
    private $courseRepo;

    public function __construct()
    {
        $this->connect = new Connection();
        $this->documentRepo = new DocumentRepository($this->connect->conn());
        $this->languageRepo = new LanguageRepository($this->connect->conn());
        $this->courseRepo = new CourseRepository($this->connect->conn());
    }

    public function showDocuments()
    {
        $documents = $this->documentRepo->getDocumentsAll();
        $courses = $this->courseRepo->getCourseAllWithoutDoc();
        $languages = $this->languageRepo->getAllLanguages();
        include_once('src/views/administration/documents.php');
    }

    public function getDocument($id)
    {
        $document = $this->documentRepo->getDocumentById($id);
        $documentData = array(
            'id' => $document->getId(),
            'title' => $document->getTitle(),
            'doc' => $document->getDocs(),
            'course' => ($document->getCourse() ? $document->getCourse()->getId() : null),
            'language' => ($document->getLanguage() ? $document->getLanguage()->getId() : null),
        );
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($documentData);
    }

    public function getDocumentById($id)
    {
        $document = $this->documentRepo->getDocumentById($id);
        return $document;
    }

    public function deleteDocument()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['doc_id']) {
            $id = $_POST['doc_id'];
            $document = $this->documentRepo->getDocumentById($id);
            $result = $this->documentRepo->deleteDocument($document);
        }

        $actionResult = "Document deleted with success!";
        $_SESSION['actionResult'] = $actionResult;
        header('Location: /admin/docs');
    }

    public function createOrUpdateDocumentFromForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lang = new Language();
            $course = new Course();
            $course->setId($_POST["course"]);
            $lang->setId($_POST["language"]);
            $document = new Document();
            $document->setTitle($_POST["title"]);
            $document->setLanguage($lang);
            $document->setCourse($course);

            $targetDir = "resources/storage/";

            if (!empty($_FILES["doc"]["name"])) {
                $document->setDocs($_FILES["doc"]["name"]);
                $targetFile = $targetDir . basename($_FILES["doc"]["name"]);

                $oldFile = $targetDir . $_POST["oldname"];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }

                if (!move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFile)) {
                    $actionResult = "Error uploading the document file.";
                    $_SESSION['actionResult'] = $actionResult;
                    header('Location: /admin/docs');
                    exit();
                }
            } else {
                $document->setDocs($_POST["oldname"]);
            }

            if ($_POST["submit"] == "create") {
                $this->documentRepo->saveDocument($document);
                $actionResult = "Document " . $document->getTitle() . " created with success!";
            } elseif ($_POST["submit"] == "update") {
                $document->setId($_POST["doc_id"]);
                $this->documentRepo->updateDocument($document);
                $actionResult = "Document " . $document->getTitle() . " updated with success!";
            }

            $_SESSION['actionResult'] = $actionResult;
            header('Location: /admin/docs');
            exit();
        }
    }
}
