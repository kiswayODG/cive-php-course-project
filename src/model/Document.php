<?php

class Document {
    private  $id;
    private  $title;
    private  $docs;
    private  $language;

    public function __construct( $id,  $title,  $docs,  $language) {
        $this->id = $id;
        $this->title = $title;
        $this->docs = $docs;
        $this->language = $language;
    }

    public function getId() {
        return $this->id;
    }

    public function setId( $id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle( $title) {
        $this->title = $title;
    }

    public function getDocs() {
        return $this->docs;
    }

    public function setDocs( $docs) {
        $this->docs = $docs;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage( $language) {
        $this->language = $language;
    }
}


?>