<?php

class CategoryRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllDocCategories()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM doccategory");
        $stmt->execute();
        $docCategories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = new DocCategory($row['id'], $row['categoryName'], $row['description']);
            $docCategories[] = $category;
        }
        return $docCategories;
    }

    public function saveDocCategory(DocCategory $category): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO doccategory (`categoryName`, `description`) VALUES (?, ?)");
        $stmt->execute([$category->getCategoryName(), $category->getDescription()]);
    }

    public function getDocCategoryById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM doccategory WHERE id = ?");
        $stmt->execute([$id]);
        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($categoryData) {
            $category = new DocCategory($categoryData['id'], $categoryData['categoryName'], $categoryData['description']);
            return $category;
        } else {
            return null;
        }
    }

    public function updateDocCategory(DocCategory $category): void
    {
        $stmt = $this->pdo->prepare("UPDATE doccategory SET `categoryName` = ?, `description` = ? WHERE id = ?");
        $stmt->execute([$category->getCategoryName(), $category->getDescription(), $category->getId()]);
    }

    public function deleteDocCategory(DocCategory $category): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM doccategory WHERE id = ?");
        $stmt->execute([$category->getId()]);
    }
}
?>
