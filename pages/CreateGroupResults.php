<?php
$host = "webdev.iyaserver.com";
$userid = "haminjin_guest";
$userpw = "DevIIHikeOn123";
$db = "haminjin_hikeOn";

// Establish a connection
$mysqli = new mysqli($host, $userid, $userpw, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize an error and success message variable
$error_message = '';
$success_message = '';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data (use mysqli_real_escape_string to sanitize input)
    $groupName = mysqli_real_escape_string($mysqli, $_POST['groupName']);
    $hikeDate = mysqli_real_escape_string($mysqli, $_POST['selectedDate']);

    // Add more variables as needed for other form fields

    // Insert data into the database using prepared statement
    $sql = "INSERT INTO groups (groupName, hikeDate) VALUES (?, ?)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $groupName, $hikeDate);

    if ($stmt->execute()) {
        $success_message = "New group created successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>

<!-- Display success message if there is any -->
<?php if (!empty($success_message)) : ?>
    <div style="color: green;"><?php echo $success_message; ?></div>
<?php endif; ?>

<!-- Display error message if there is any -->
<?php if (!empty($error_message)) : ?>
    <div style="color: red;"><?php echo $error_message; ?></div>
<?php endif; ?>

