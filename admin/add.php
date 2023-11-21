
<?php

$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $description = $_POST["description"];
    // Add additional fields as per your requirements

    // Prepare and execute the SQL statement to insert data into the database
    $stmt = $mysql->prepare("INSERT INTO mainView (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();

    // Redirect to the main page after successful insertion
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Hike</title>
    <!-- Link to a different CSS ? -->
</head>
<body>
    <h1>Add Hike</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <!-- Add additional form fields as per your requirements -->

        <input type="submit" value="Add">