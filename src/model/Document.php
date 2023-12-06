<?php

class Document {
    private int $id;
    private string $title;
    private string $docs;
    private int $language;

    public function __construct(int $id, string $title, string $docs, int $language) {
        $this->id = $id;
        $this->title = $title;
        $this->docs = $docs;
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

    public function getDocs(): string {
        return $this->docs;
    }

    public function setDocs(string $docs): void {
        $this->docs = $docs;
    }

    public function getLanguage(): int {
        return $this->language;
    }

    public function setLanguage(int $language): void {
        $this->language = $language;
    }
}


?>