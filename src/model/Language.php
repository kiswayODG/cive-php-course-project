<?php
class Language {
    private  $id;
    private  $languageName;

    public function __construct($id='', $languageName='') {
        $this->id = $id;
        $this->languageName = $languageName;
    }

    public function getId() {
        return $this->id;
    }

    public function setId( $id): void {
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