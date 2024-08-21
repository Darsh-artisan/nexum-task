<?php
session_start();
$rand = rand(1000, 9999);
$_SESSION['captcha'] = $rand; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="submit_register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="course_name">Course Name:</label>
            <select id="course_name" name="course_name">
                <option value="B.Tech">B.Tech</option>
                <option value="M.Tech">M.Tech</option>
                <option value="Bsc">Bsc</option>
                <option value="Msc">Msc</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
            </select>

            <label for="semester">Semester:</label>
            <select id="semester" name="semester">
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
                <option value="IX">IX</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="captcha">Captcha:</label>
            <div class="captcha">
                <input type="text" id="captcha" name="captcha" required placeholder="Enter Captcha">
                <div class="captcha"><?php echo $rand; ?></div>
            </div>

            <input type="submit" value="Register">
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
