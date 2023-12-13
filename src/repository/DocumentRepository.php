<?php

require_once('LanguageRepository.php');

class DocumentRepository
{
    private $pdo;
    private $languageRepo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->languageRepo = new LanguageRepository($pdo);
    }

    public function getDocumentsAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents");
        $stmt->execute();
        $documents = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $language = $this->languageRepo->getLanguageById($row['language']);

            $document = new Document($row['id'], $row['title'], $row['docs'], $language);
            $documents[] = $document;
        }

        return $documents;
    }

    public function saveDocument(Document $document)
    {
        $stmt = $this->pdo->prepare("INSERT INTO documents (`title`, `docs`, `language`) VALUES (?, ?, ?)");
        $stmt->execute([$document->getTitle(), $document->getDocs(), $document->getLanguage()->getId()]);
    }

    public function getDocumentById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $language = $this->languageRepo->getLanguageById($row['language']);

            $document = new Document($row['id'], $row['title'], $row['docs'], $language);

            return $document;
        } else {
            return null;
        }
    }

    public function updateDocument(Document $document)
    {
        // Retrieve the existing document path
        $stmt = $this->pdo->prepare("SELECT `docs` FROM documents WHERE id = ?");
        $stmt->execute([$document->getId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Remove the existing physical document file
            $existingDocumentPath = $row['docs'];
            if (file_exists($existingDocumentPath)) {
                unlink($existingDocumentPath);
            }
        }

        // Update the database record with the new document information
        $stmt = $this->pdo->prepare("UPDATE documents SET `title` = ?, `docs` = ?, `language` = ? WHERE id = ?");
        $stmt->execute([$document->getTitle(), $document->getDocs(), $document->getLanguage()->getId(), $document->getId()]);
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
}

?>
