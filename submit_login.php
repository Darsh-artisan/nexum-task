<?php
session_start();
include 'db_connect.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];

    if ($captcha == $_SESSION['captcha']) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['student_id'] = $user['id'];
                header("Location: feedback.php");
                exit;
            } else {
                echo "Password is incorrect.";
            }
        } else {
            echo "Email not found.";
        }
    } else {
        echo "Invalid CAPTCHA.";
    }
}

?>
