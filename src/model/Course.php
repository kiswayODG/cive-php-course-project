<?php

class Course {
private int $id;
private string $courseName;
private string $courseIntroduction;
private int $language;
private string $outline;

public function __construct(int $id, string $courseName, string $courseIntroduction, int $language, string $outline) {
$this->id = $id;
$this->courseName = $courseName;
$this->courseIntroduction = $courseIntroduction;
$this->language = $language;
$this->outline = $outline;
}

public function getId(): int {
return $this->id;
}

public function setId(int $id): void {
$this->id = $id;
}

public function getCourseName(): string {
return $this->courseName;
}

public function setCourseName(string $courseName): void {
$this->courseName = $courseName;
}

public function getCourseIntroduction(): string {
return $this->courseIntroduction;
}

public function setCourseIntroduction(string $courseIntroduction): void {
$this->courseIntroduction = $courseIntroduction;
}

public function getLanguage(): int {
return $this->language;
}

public function setLanguage(int $language): void {
$this->language = $language;
}

// Getter for outline
public function getOutline(): string {
return $this->outline;
}

public function setOutline(string $outline): void {
$this->outline = $outline;
}
}

?>
