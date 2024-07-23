<?php

include_once('src/model/Document.php');
class Course
{
    private  $id;
    private  $courseName;
    private  $courseIntroduction;

    private  $provider;
    private  $document;
    private  $language;
    private  $outline;

   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument($document)
    {
        $this->document = $document;
    }

    public function getCourseName()
    {
        return $this->courseName;
    }

    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
    }

    public function getCourseIntroduction()
    {
        return $this->courseIntroduction;
    }

    public function setCourseIntroduction($courseIntroduction)
    {
        $this->courseIntroduction = $courseIntroduction;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    // Getter for outline
    public function getOutline()
    {
        return $this->outline;
    }

    public function setOutline($outline)
    {
        $this->outline = $outline;
    }

  
}
