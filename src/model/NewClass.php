<?php

class NewClass {
    private int $id;
    private string $className;
    private string $description;

    public function __construct(int $id, string $className, string $description) {
        $this->id = $id;
        $this->className = $className;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getClassName(): string {
        return $this->className;
    }

    public function setClassName(string $className): void {
        $this->className = $className;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }
}
?>
