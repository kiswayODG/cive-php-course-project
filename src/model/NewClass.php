<?php

class NewClass {
    private  $id;
    private  $className;
    private  $description;

    public function __construct( $id='',  $className='',  $description='') {
        $this->id = $id;
        $this->className = $className;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId( $id): void {
        $this->id = $id;
    }

    public function getClassName() {
        return $this->className;
    }

    public function setClassName( $className): void {
        $this->className = $className;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription( $description): void {
        $this->description = $description;
    }
}
?>
