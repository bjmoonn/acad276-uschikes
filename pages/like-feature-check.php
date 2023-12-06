<?php
session_start();

$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

if (isset($_SESSION["login"]) === FALSE) {
    $likeStatus = 0;
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents("php://input");
    $jsonData = json_decode($postData, true);

    $hikeName = $jsonData['hikeName'];
    $email = $_SESSION['email'];

    // Check if the hike is a favorite for the current user
    $query = "SELECT COUNT(*) as count FROM favorites 
              INNER JOIN mainHikes ON favorites.hikeID = mainHikes.hikeID
              INNER JOIN users ON favorites.userID = users.userID
              WHERE mainHikes.name = '$hikeName' AND users.userName = '$email'";

    $result = $mysql->query($query);
    $row = $result->fetch_assoc();

    if($row['count'] > 0){
        $likeStatus = 1;
    } else {
        $likeStatus = 0;
    }
}
echo json_encode(array('likeStatus' => $likeStatus));
?>

