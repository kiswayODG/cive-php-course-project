<?php

include_once("src/model/DocCategory.php");
class Document {
    private  $id;
    private  $title;
    private  $docs;
    private $course;
    private  $language;
    private $category;
    private $detail;


    public function getId() {
        return $this->id;
    }

    public function setId( $id) {
        $this->id = $id;
    }

    public function getDocCategory() {
        return $this->category;
    }

    public function setDetail($detail) {
        $this->detail = $detail;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function getDetail() {
        return $this->detail;
    }

    public function setDocCategory( $category) {
        $this->category = $category;
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