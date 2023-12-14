<?php

class LanguageRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getLanguageById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM language WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $language = new Language($row['id'], $row['language']);
            return $language;
        } else {
            return null;
        }
    }

    public function getAllLanguages()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM language");
        $stmt->execute();
        $languages = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $language = new Language($row['id'], $row['language']);
            $languages[] = $language;
        }

        return $languages;
    }

  
    public function saveLanguage(Language $language)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `language` (`language`) VALUES (?)");
        $stmt->execute([$language->getLanguageName()]);
    }

    public function updateLanguage(Language $language)
    {
        $stmt = $this->pdo->prepare("UPDATE `language` SET `language` = ? WHERE id = ?");
        $stmt->execute([$language->getLanguageName(), $language->getId()]);
    }

    public function deleteLanguage(Language $language)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `language` WHERE id = ?");
        return $stmt->execute([$language->getId()]);
    }
}

?>
