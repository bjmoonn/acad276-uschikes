<?php
session_start();

$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strpos($email, "@usc.edu") === false) {
        echo "<p>Only USC email addresses are allowed.</p>";
    } else {
        $query = "SELECT * FROM users WHERE userName = '$email'";
        $result = $mysql->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $validPassword = $row['userPsswd'];

            if ($password === $validPassword) {
                $_SESSION["login"] = true;
                $_SESSION["email"] = $email;

                header("Location: index.php");
                exit();
            } else {
                echo "<p>Invalid email or password.</p>";
            }
        } else {
            echo "<p>No existing user.</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-stylesheet.css">
    <title>Login</title>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <div class="logo-container">
        <img src="public/assets/icons/green logo.png" alt="Logo">
    </div>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
</div>

</body>
</html>
