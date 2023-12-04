<?php include 'logged-in.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../pages/login.module.css">
</head>
<body>
    <?php include "logged-in.php" ?>
<div class="login-container">
    <h2>Sign Up</h2>
    <?php
    $mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

    if ($mysql->connect_error) {
        die("Connection failed: " . $mysql->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (userName, userPsswd) VALUES ('$email', '$password')";

        if (strpos($email, "@usc.edu") === false) {
            echo "<p>Only USC email addresses are allowed.</p>";
        } else if ($mysql->query($query) === TRUE) {
            echo "User created successfully!";
        } else {
            echo "Error: " . $query . "<br>" . $mysql->error;
        }
    }

    $mysql->close();
    ?>

    <div class="logo-container">
        <img src="../public/assets/icons/green logo.png" alt="Logo">
    </div>
    <form method="post" action="signup.php">
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Sign Up">
    </form>
</div>
        <div class="footer">
            <img class="footer-logo" src="public/assets/icons/logotype bottom.png">
            <div class="footer-links">
            <a href="../pages/TeamPage.php">Team</a>
                <a href="../pages/faq.html">FAQ</a>
            </div>
        </div>
</body>
</html>

