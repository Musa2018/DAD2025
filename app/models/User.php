<?php
require_once __DIR__ . '/../config/database.php';

class User {
    public function create($username, $email, $password) {
        global $pdo;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (users_name, users_email, users_password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    public function findByEmail($email) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE users_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
