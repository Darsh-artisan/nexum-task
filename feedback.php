<?php
include 'session.php';
include 'db_connect.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$_SESSION['student_id']]);
$student = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Feedback</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Student Feedback</h2>
        <form action="submit_feedback.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $student['name'] ?>" readonly>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>" readonly>

            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" value="<?= $student['course_name'] ?>" readonly>

            <label for="semester">Semester:</label>
            <input type="text" id="semester" name="semester" value="<?= $student['semester'] ?>" readonly>

            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" multiple>
                <option value="Poor">Poor</option>
                <option value="Medium">Medium</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
            </select>

            <label for="feedback_text">Feedback:</label>
            <textarea id="feedback_text" name="feedback_text" required></textarea>

            <input type="submit" value="Submit Feedback">
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
