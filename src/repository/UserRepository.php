<?php

class UserRepository {
private PDO $pdo;

public function __construct(PDO $pdo) {
$this->pdo = $pdo;
}

public function getUserAll() {
    $stmt = $this->pdo->prepare("SELECT * FROM users");
    $users = $stmt->fetchAll();
    return $users;
    }

public function saveUser(User $user): void {
$stmt = $this->pdo->prepare("INSERT INTO users ( username, password, email) VALUES (?, ?, ?, ?)");
$stmt->execute([ $user->getUsername(), $user->getPassword(), $user->getEmail()]);
}

public function getUserById(int $userId): ?User {
$stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userId]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
return null;
}

return new User($userData['id'], $userData['username'], $userData['password'], $userData['email']);
}

public function updateUser(User $user): void {
$stmt = $this->pdo->prepare("UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?");
$stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getId()]);
}

public function deleteUser(User $user): void {
$stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$user->getId()]);
}

// Vous pouvez ajouter d'autres méthodes selon les besoins spécifiques de votre application
}
?>