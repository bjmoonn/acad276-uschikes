<?php
$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}


$message = '';
$hikeID = isset($_GET['id']) ? $_GET['id'] : null;

if(!$hikeID) {
    $message = 'Error: No ID provided for deletion.';
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    // A post request means the confirmation form was submitted
    if(isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        // Prepare a delete statement
        $sql = "DELETE FROM mainView WHERE hikeID = ?";
        
        if($result = $mysql->prepare($sql)) {
            $result->bind_param("i", $hikeID);
            
            if($result->execute()) {
                // redirect to admin main page
                header("Location: index.php?message=Hike+deleted+successfully");
                exit();
            } else {
                $message = "Error: " . $result->error;
            }
            $result->close();
        } else {
            $message = "Error: " . $mysql->error;
        }
    } elseif(isset($_POST['confirm']) && $_POST['confirm'] == 'no') {
        // User decided not to delete
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Hike Confirmation</title>
</head>
<body>
    <h1>Delete Hike</h1>
    <?php if($message): ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <p>Are you sure you want to delete this hike?</p>
        <form action="delete.php?id=<?php echo $hikeID; ?>" method="post">
            <input type="hidden" name="hikeID" value="<?php echo $hikeID; ?>">
            <input type="submit" name="confirm" value="yes">
            <input type="submit" name="confirm" value="no">
        </form>
    <?php endif; ?>
</body>
</html>
