<?php

class DocCategory {
    private  $id;
    private  $categoryName;
    private  $description;

    public function __construct( $id='',  $categoryName='',  $description='') {
        $this->id = $id;
        $this->categoryName = $description;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId( $id): void {
        $this->id = $id;
    }

    public function getCategoryName() {
        return $this->categoryName;
    }

    public function setCategoryName( $categoryName): void {
        $this->categoryName = $categoryName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription( $description): void {
        $this->description = $description;
    }
}
?>
