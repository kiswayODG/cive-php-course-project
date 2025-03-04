<?php
require_once('NewClass.php');
require_once('User.php');
require_once('Language.php');

class News {
    private  $id;
    private  $title;
    private  $author;
    private  $pubDate;
    private  $content;
    private  $newClass;
    private $illustration;
    private  $language;

    public function __construct(
         $id="",
         $title="",
         $author=null,
         $pubDate="",
         $content="",
         $newClass=null,
         $illustration="",
         $language=null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->pubDate = $pubDate;
        $this->content = $content;
        $this->newClass = $newClass;
        $this->language = $language;
        $this->illustration = $illustration;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle( $title): void {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor( $author): void {
        $this->author = $author;
    }

    public function getPubDate()  {
        return $this->pubDate;
    }

    public function setPubDate( $pubDate): void {
        $this->pubDate = $pubDate;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getNewClass() {
        return $this->newClass;
    }

    public function setNewClass( $newClass): void {
        $this->newClass = $newClass;
    }

    public function getIllustration() {
        return $this->illustration;
    }

    public function setIllustration($illustration): void {
        $this->illustration = $illustration;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage( $language): void {
        $this->language = $language;
    }
}
?>