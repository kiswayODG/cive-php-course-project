<?php

require_once('UserRepository.php');
require_once('ClassRepository.php');
require_once('src/model/News.php');


class NewRepository
{
    private  $pdo;
    private  $userRepo;
    private  $classRepo;
    

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->userRepo = new UserRepository($pdo);
        $this->classRepo = new ClassRepository($pdo);
    }

    public function getNewsAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM news");
        $stmt->execute();
        $news = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $author = $this->userRepo->getUserById($row['author']);
            $class = $this->classRepo->getClassById($row['newclass']);
            $lang = new Language();
            $lang->setId($row['language']);

            $new = new News($row['id'],$row['title'],$author,$row['pubdate'],$row['content'],$class,$lang);
            $news[] = $new;
        }
        return $news;
    }

    public function saveNew(News $new)
    {
        $stmt = $this->pdo->prepare("INSERT INTO news (`title`, `author`,`pubdate`, `content`,`newclass`, `language`) VALUES (?, ?,?, ?,?, ?)");
        $stmt->execute([$new->getTitle(), $new->getAuthor()->getId(),$new->getPubDate(),$new->getContent(),$new->getNewClass()->getId(),$new->getLanguage()->getId()]);
    }


    public function getNewById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $author = $this->userRepo->getUserById($row['author']);
            $class = $this->classRepo->getClassById($row['newclass']);
            $lang = new Language();
            $lang->setId($row['language']);

            $new = new News($row['id'],$row['title'],$author,$row['pubdate'],$row['content'],$class,$lang);
            
            return $new;
        }else{
            return null;
        }
    }

    public function updateNews(News $news): void
    {
        $stmt = $this->pdo->prepare("UPDATE news SET `title` = ?, `author` = ?, `pubdate` = ?, `content` = ?, `newclass` = ?, `language` = ? WHERE id = ?");
        $stmt->execute([$news->getTitle(), $news->getAuthor()->getId(), $news->getPubDate(), $news->getContent(), $news->getNewClass()->getId(), $news->getLanguage()->getId(), $news->getId()]);
    }
    
    public function deleteNews(News $news)
    {
        $stmt = $this->pdo->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$news->getId()]);
    }

}
