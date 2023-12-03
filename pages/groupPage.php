<html>
<head>
    <meta charset="UTF-8">
    <title>Groups</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="stylesheet" href="../css/typography.css" type="text/css">
    <link rel="stylesheet" href="../css/colors.css" type="text/css">
    <link rel="stylesheet" href="groupPage.module.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">


</head>
<body>

<?php
$host = "webdev.iyaserver.com";
$userid = "haminjin_guest";
$userpw = "DevIIHikeOn123";
$db = "haminjin_hikeOn";

// establish a connection
$mysqli = new mysqli($host, $userid, $userpw, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->close();
?>

    <div class="nav">
        <div class="logo">
            <a href="../index.php"><img src="../public/assets/icons/green logo.png"></a>
        </div>
        <div class="nav-items">
            <text class="body bold"><a href="../pages/map-page.php">Map</a></text>
            <text class="body bold"><a href="../pages/groupPage.php">Groups</a></text>
            <text class="body bold"><a href="../pages/login.php">Log-in</a></text>
            <text class="body bold"><a href="../pages/profilepage.php">Profile</a></text>
        </div>
    </div>
    <div class="headline">
        <text class="title">Groups</text>
        <text class="copy1">Connect with other outdoor Trojans! Join an upcoming hike.</text>
    </div>

    <div class="featuredbox">
        <div class="featured">Featured</div>
        <div class="container1">
        <div class="filtersbutton "> Filters </div>
        <div class="CreateGroupButton" onclick="toggleGroupPopup()"> Create A Group </div>
        </div>
    </div>

<div class="break"></div>

    <div>
        <div class="category">Casual</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Hollywood Hike</div>
            <div class="hikeDistance">4.1 mi away • 20 min</div>
            <div class="profile-container">
             <img src="../public/assets/images/profile1.avif" class="profileIcon">
                <img src="../public/assets/images/profile2.webp" class="profileIcon">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile4.webp" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Malibu Adventure</div>
            <div class="hikeDistance">16.2 mi away • 40 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile5.webp" class="profileIcon">
                <img src="../public/assets/images/profile6.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="category">Amateaur</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Desert Fun</div>
            <div class="hikeDistance">100 mi away •  3 hours</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile9.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Runyun Canyon</div>
            <div class="hikeDistance">12.1 mi away • 36 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile1.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="category">Hardcore</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Temescal Canyon</div>
            <div class="hikeDistance">25.3 mi away • 1 hour 6 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile9.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile5.webp" class="profileIcon">
                <img src="../public/assets/images/profile4.webp" class="profileIcon">
                <img src="../public/assets/images/profile2.webp" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Climbing Trip! </div>
            <div class="hikeDistance">30.9 mi away • 58 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile6.avif" class="profileIcon">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
            </div>
        </div>

    </div>

<div class="GroupPopup" id="groupPopup">
    <img src="x.png" class="x" id="closeButton">
    <p class="Popupheading">Create a Group</p>
    <div class="formContainer">
        <form action="CreateGroupResults.php" method="get">
            First and Last Name: <input type="text" name="ownerName" required>
            <br>
            <br>
            Group Name: <input type="text" name="groupName" required>
            <br>
            <br>
            Hike Location: <input type="text" name="hikeLocation" required>
            <br>
            <br>
            <label for="selectedDate">Select a Date:</label>
            <input type="date" id="selectedDate" name="selectedDate" required>
            <br>
            <br>
            Start Time: <input type="time" id="selectedTime" name="selectedTime" required>
            <br>
            <br>
            Terrain Type: <input type="text" name="difficultyLevel" required>
            <br>
            <br>
            Difficulty: <input type="text" name="difficultyLevel" required>
            <br>
            <br>
            Please add a description or anything information you would want potential members to know:
            <br>
            <br>
            <textarea id="hikeDescription" name="userInput" rows="4" cols="40" placeholder="Type here..."></textarea>
           <br>
            <br>
            <input type="submit">
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Wait for the document to be fully loaded

        // Get references to the x div and GroupPopup div
        var closeButton = document.getElementById("closeButton");
        var groupPopup = document.getElementById("groupPopup");

        // Add a click event listener to the closeButton
        closeButton.addEventListener("click", function() {
            // Toggle the visibility of the groupPopup
            if (groupPopup.style.display === 'none' || groupPopup.style.display === '') {
                groupPopup.style.display = 'block';
            } else {
                groupPopup.style.display = 'none';
            }
        });
    });

    function toggleGroupPopup() {
        var popup = document.getElementById('groupPopup');
        if (popup.style.display === 'none' || popup.style.display === '') {
            popup.style.display = 'block';
        } else {
            popup.style.display = 'none';
        }
    }
</script>




    <div class="footer">
    <img class="footer-logo" src="public/assets/icons/logotype bottom.png">
    <div class="footer-links">
        <a href="../pages/teampage.php">Team</a>
        <a href="../pages/faq.html">FAQ</a>
    </div>
</div>
</body>
</html>