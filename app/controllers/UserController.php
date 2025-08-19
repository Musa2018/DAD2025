<?php
require_once __DIR__ . '/../models/User.php';



class UserController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->create($username, $email, $password)) {
                echo "User  registered successfully!";
            } else {
                echo "Error registering user.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $existingUser  = $user->findByEmail($email);
            if ($existingUser  && password_verify($password, $existingUser ['users_password'])) {
                echo "Login successful!";
                // يمكنك هنا بدء جلسة (session) للمستخدم
            } else {
                echo "Invalid email or password.";
            }
        }
    }
}
?>
