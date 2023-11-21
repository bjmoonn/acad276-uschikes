<?php

$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

// Fetch all hikes from the mainView table
$result = $mysqli->query("SELECT * FROM mainView");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Link to a different CSS ? -->
</head>
<body>
    <div id="admin-nav">
        <a href="/admin/add.php">Add Hike</a>
        <a href="/admin/edit.php">Edit Hike</a>
        <a href="/admin/delete.php">Delete Hike</a>
    </div>

    <div id="admin-main">
        <h1>Admin Dashboard</h1>
        <h2>Hikes List</h2>
        <?php
        $sql = "SELECT * FROM mainView";
        $result = $mysql->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Actions</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row["hikeID"] . "'>Edit</a>
                            <a href='delete.php?id=" . $row["hikeID"] . "'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }
        ?>
    </div>
</body>
</html>

   