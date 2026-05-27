<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        
        $username = trim($_POST['username']);
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = $_POST['password'];
        $role = isset($_POST['role']) ? $_POST['role'] : 'student';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashed_password,
                ':role' => $role
            ]);
            header("Location: index.php?registration=success");
            exit;
        } catch (PDOException $e) {
            die("Registration error: " . $e->getMessage());
        }

    } else {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header("Location: landing.php");
                exit;
            } else {
                header("Location: index.php?error=invalid_credentials");
                exit;
            }
        } catch (PDOException $e) {
            die("Login error: " . $e->getMessage());
        }
    }
} else {
    header("Location: index.php");
    exit;
}
?>