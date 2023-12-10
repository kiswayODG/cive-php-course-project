<?php

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserAll()
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], "", $row['email']);
            $user->setId($row['id']);
            $users[] = $user;
        }
        return $users;
    }

    public function saveUser(User $user): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users ( username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail()]);
    }


    public function getUserById(int $userId): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            $user = new User();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            return $user;
        }else{
            return null;
        }
    }

    public function updateUser(User $user): void
    {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->execute([$user->getUsername(), $user->getEmail(), $user->getId()]);
    }

    public function deleteUser(User $user): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user->getId()]);
    }

    // Vous pouvez ajouter d'autres méthodes selon les besoins spécifiques de votre application
}
