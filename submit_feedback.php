<?php
include 'session.php';
include 'db_connect.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_SESSION['student_id'];
    $feedback_date = $_POST['date'];
    $tags = isset($_POST['tags']) && is_array($_POST['tags']) ? implode(',', $_POST['tags']) : '';
    $feedback_text = $_POST['feedback_text'];

    $stmt = $pdo->prepare("INSERT INTO feedback (student_id, feedback_date, tags, feedback_text) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$student_id, $feedback_date, $tags, $feedback_text])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: Could not submit feedback.";
    }
}
?>
