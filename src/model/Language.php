<?php
class Language {
    private int $id;
    private string $languageName;

    public function __construct(int $id, string $languageName) {
        $this->id = $id;
        $this->languageName = $languageName;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getLanguageName(): string {
        return $this->languageName;
    }

    public function setLanguageName(string $languageName): void {
        $this->languageName = $languageName;
    }
}

?>