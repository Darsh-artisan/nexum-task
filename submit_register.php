<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $course_name = trim($_POST['course_name']);
    $semester = trim($_POST['semester']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $captcha_input = trim($_POST['captcha']);

   
    $errors = [];

    if (empty($name) || empty($course_name) || empty($semester) || empty($email) || empty($password) || empty($captcha_input)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($captcha_input != $_SESSION['captcha']) {
        $errors[] = "Incorrect CAPTCHA. Please try again.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO students (name, course_name, semester, email, password) VALUES (?, ?, ?, ?, ?)");

        $result = $stmt->execute([$name, $course_name, $semester, $email, $hashed_password]);

        if ($result) {
            echo "Registration successful! You can now <a href='index.php'>log in</a>.";
        } else {
            echo "There was an error registering your account. Please try again.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
?>
