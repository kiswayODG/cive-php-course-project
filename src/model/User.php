<?php

class User{
    private int $id;
    private string $username;
    private string $password;
    private string $email;

    public function __construct( string $username='', string $password='', string $email='') {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}

?>