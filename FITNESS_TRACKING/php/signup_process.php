<?php
include 'db.php';
session_start();

// 1. Database configuration — change these to your actual credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'projectDb');
define('DB_USER', 'root');
define('DB_PASS', '');

$error = '';

try {
    // 2. Create a PDO connection
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Database connection failed.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (strlen($username) < 3 || strlen($password) < 6) {
        $error = 'Username must be at least 3 chars; password at least 6 chars.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $error = 'Username already taken.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");

            if ($insert->execute([$username, $hash])) {
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['username'] = $username;

                // ✅ Redirect to profile_information.php
                header("Location: ../profile_information.php");
                exit;
            } else {
                $error = 'Signup failed. Please try again later.';
            }
        }
    }
}
?>
