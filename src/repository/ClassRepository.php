<?php

class ClassRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getNewsClassAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM newclass");
        $stmt->execute();
        $newsclasses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cat = new NewClass($row['id'],$row['classname'],$row['description']);
            $newsclasses[] = $cat;
        }
        return $newsclasses;
    }

    public function saveNClass(NewClass $class): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO newclass (`classname`, `description`) VALUES (?, ?)");
        $stmt->execute([$class->getClassName(), $class->getDescription()]);
    }


    public function getClassById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM newclass WHERE id = ?");
        $stmt->execute([$id]);
        $classData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($classData) {
            $class = new NewClass($classData['id'],$classData['classname'],$classData['description']);
           
            return $class;
        }else{
            return null;
        }
    }

    public function updateClass(NewClass $class): void
    {
        $stmt = $this->pdo->prepare("UPDATE newclass SET `classname` = ?, `description` = ? WHERE id = ?");
        $stmt->execute([$class->getClassName(), $class->getDescription(),$class->getId()]);
    }

    public function deleteClass(NewClass $class): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM newclass WHERE id = ?");
        $stmt->execute([$class->getId()]);
    }

}
