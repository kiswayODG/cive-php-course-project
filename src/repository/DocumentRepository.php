<?php

require_once('LanguageRepository.php');

class DocumentRepository
{
    private $pdo;
    private $languageRepo;
    private $courseRepo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->languageRepo = new LanguageRepository($pdo);
    }

    public function getDocumentsAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents");
        $stmt->execute();
        $documentsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documentsData as $docData) {
            $docs[] = $this->rowMapper($docData);
        }

        return $docs;
    }

    public function getDocumentsAllWithoutCourse()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents where course_id IS NULL");
        $stmt->execute();
        $documentsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documentsData as $docData) {
            $courses[] = $this->rowMapper($docData);
        }

        return $courses;
    }

    public function saveDocument(Document $document)
    {
        $stmt = $this->pdo->prepare("INSERT INTO documents (`title`, `docs`,`course_id`, `language`) VALUES (?, ?, ?,?)");
        $stmt->execute([$document->getTitle(), $document->getDocs(), ($document->getCourse() ? $document->getCourse()->getId() : null), $document->getLanguage()->getId()]);
    }

    public function getDocumentById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->rowMapper($row);
    }

    public function updateDocument(Document $document)
    {
        $stmt = $this->pdo->prepare("SELECT `docs` FROM documents WHERE id = ?");
        $stmt->execute([$document->getId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $existingDocumentPath = $row['docs'];
            if (file_exists($existingDocumentPath)) {
                unlink($existingDocumentPath);
            }
        }


        $stmt = $this->pdo->prepare("UPDATE documents SET `title` = ?, `docs` = ?, `course_id` = ?, `language` = ? WHERE id = ?");
        $stmt->execute([$document->getTitle(), $document->getDocs(), ($document->getCourse() ? $document->getCourse()->getId() : null), $document->getLanguage()->getId(), $document->getId()]);
    }

    public function deleteDocument(Document $document)
    {
        // Retrieve the document path before deletion
        $stmt = $this->pdo->prepare("SELECT `docs` FROM documents WHERE id = ?");
        $stmt->execute([$document->getId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Remove the physical document file
            $documentPath = $row['docs'];
            if (file_exists($documentPath)) {
                unlink($documentPath);
            }
        }

        // Delete the database record
        $stmt = $this->pdo->prepare("DELETE FROM documents WHERE id = ?");
        return $stmt->execute([$document->getId()]);
    }

    public function getCourseId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            return null;
        }

        $course = new Course();
        $course->setId($data['id']);
        $course->setCourseName($data['coursename']);
        $course->setCourseIntroduction($data['course_introduction']);
        $course->setProvider($data['provider']);
        $course->setOutline($data['outline']);

        if (isset($data['doc_id'])) {
            $document = $this->getDocumentById($data['doc_id']);
            $course->setDocument($document);
        }

        return $course;
    }

    public  function rowMapper($data)
    {
        $document = new Document();
        $document->setId($data['id']);
        $document->setTitle($data['title']);
        $document->setDocs($data['docs']);
        $document->setDetail($data['detail']);

        if (isset($data['course_id'])) {
            $course = $this->getCourseId($data['course_id']);
            $document->setCourse($course);
        }

        if (isset($data['category'])) {
            $category = new DocCategory();
            $category->setCategoryName($data['category']);
            $document->setDocCategory($category);
        }

        if (isset($data['language'])) {
            $language = new Language();
            $language->setId($data['language']);
            $document->setLanguage($language);
        }

        return $document;
    }
}
