<?php

class News {
    private int $id;
    private string $title;
    private int $author;
    private \DateTime $pubDate;
    private string $content;
    private int $newClass;
    private int $language;

    public function __construct(
        int $id,
        string $title,
        int $author,
        \DateTime $pubDate,
        string $content,
        int $newClass,
        int $language
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->pubDate = $pubDate;
        $this->content = $content;
        $this->newClass = $newClass;
        $this->language = $language;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getAuthor(): int {
        return $this->author;
    }

    public function setAuthor(int $author): void {
        $this->author = $author;
    }

    public function getPubDate(): \DateTime {
        return $this->pubDate;
    }

    public function setPubDate(\DateTime $pubDate): void {
        $this->pubDate = $pubDate;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getNewClass(): int {
        return $this->newClass;
    }

    public function setNewClass(int $newClass): void {
        $this->newClass = $newClass;
    }

    public function getLanguage(): int {
        return $this->language;
    }

    public function setLanguage(int $language): void {
        $this->language = $language;
    }
}
?>