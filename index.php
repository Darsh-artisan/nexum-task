<?php
session_start();
$rand = rand(1000, 9999);
$_SESSION['captcha'] = $rand; // Store CAPTCHA in session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Student Login</h2>
        <form action="submit_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="captcha">Captcha:</label>
            <div class="captcha">
                <input type="text" id="captcha" name="captcha" required placeholder="Enter Captcha">
                <div class="captcha"><?php echo $_SESSION['captcha']; ?></div>
            </div>

            <input type="submit" value="Login">
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
