<?php

class Course {
private  $id;
private  $courseName;
private  $courseIntroduction;
private  $language;
private  $outline;

public function __construct( $id,  $courseName,  $courseIntroduction,  $language,  $outline) {
$this->id = $id;
$this->courseName = $courseName;
$this->courseIntroduction = $courseIntroduction;
$this->language = $language;
$this->outline = $outline;
}

public function getId() {
return $this->id;
}

public function setId(int $id) {
$this->id = $id;
}

public function getCourseName() {
return $this->courseName;
}

public function setCourseName( $courseName) {
$this->courseName = $courseName;
}

public function getCourseIntroduction() {
return $this->courseIntroduction;
}

public function setCourseIntroduction( $courseIntroduction) {
$this->courseIntroduction = $courseIntroduction;
}

public function getLanguage() {
return $this->language;
}

public function setLanguage( $language) {
$this->language = $language;
}

// Getter for outline
public function getOutline() {
return $this->outline;
}

public function setOutline( $outline) {
$this->outline = $outline;
}
}

?>
