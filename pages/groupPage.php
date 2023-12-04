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

// Establish a connection
$mysqli = new mysqli($host, $userid, $userpw, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize an error message variable
$error_message = '';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groupName = $_POST['groupName'];  // Replace 'groupName' with the actual name attribute of your form field
    $hikeDate = $_POST['selectedDate'];  // Replace 'selectedDate' with the actual name attribute of your form field
    // Add more variables as needed for other form fields

    // Insert data into the database
    $sql = "INSERT INTO groups (groupName, hikeDate) VALUES ('$groupName', '$hikeDate')";

    if ($mysqli->query($sql) === TRUE) {
        echo "New group created successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>

<!-- Display error message if there is any -->
<?php if (!empty($error_message)) : ?>
    <div style="color: red;"><?php echo $error_message; ?></div>
<?php endif; ?>

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
        <text class="body">Connect with other outdoor Trojans! Join an upcoming hike.</text>
    </div>

    <div class="featuredbox">
        <div class="featured">Featured</div>
        <div class="container1">
            <div class="filtersbutton" id="openFiltersButton"> Filters </div>
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
        <form action="CreateGroupResults.php" method="post" class="groupSubmitForm">
            User ID: <input type="text" name="userID" required>

            Group Name: <input type="text" name="groupName" required>

            Hike ID <input type="text" name="hikeID" required>
            
            <label for="startDateTime">Start Date/Time:</label>
            <input type="date" id="startDateTime" name="startDateTime" required>

            <label for="endDateTime">End Date/Time:</label>
            <input type="date" id="endDateTime" name="endDateTime" required>

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


<form action="results.php" method="post">
    <div class="bigger-filter-container" id="filtersPopUp" class="shadow">
        <img src="x.png" class="x2" id="closeFiltersButton">
        <div class="filter-container2">
            <div class="dropdown-groups">
                <!-- Difficulty Dropdown -->
                <div class="dropdown">
                    <div class="dropdown-text body"><strong>Difficulty</strong></div>
                    <div class="dropdown-wrapper">
                        <div class="dropdown-inner">
                            <div class="checkbox-holder">
                                <label for="Easy" class="body lightgrey">Easy</label>
                                <input type="checkbox" id="Easy" name="Easy">
                            </div>
                            <div class="checkbox-holder">
                                <label for="Moderate" class="body lightgrey">Moderate</label>
                                <input type="checkbox" id="Moderate" name="Moderate">
                            </div>
                            <div class="checkbox-holder">
                                <label for="Hard" class="body lightgrey">Hard</label>
                                <input type="checkbox" id="Hard" name="Hard">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="dropdown">
                    <div class="dropdown-text body"><strong>From USC</strong></div>
                    <div class="dropdown-wrapper">
                        <div class="dropdown-inner">
                            <div class="checkbox-holder">
                                <label for="15Box" class="body lightgrey">1-5 mi</label>
                                <input type="checkbox" id="15Box" name="15Box">
                            </div>
                            <div class="checkbox-holder">
                                <label for="520Box" class="body lightgrey">5-20 mi</label>
                                <input type="checkbox" id="520Box" name="520Box">
                            </div>
                            <div class="checkbox-holder">
                                <label for="20Box" class="body lightgrey">20+ mi</label>
                                <input type="checkbox" id="20Box" name="20Box">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="dropdown">
                    <div class="dropdown-text body"><strong>Length</strong></div>
                    <div class="dropdown-wrapper">
                        <div class="dropdown-inner">
                            <div class="checkbox-holder">
                                <label for="15" class="body lightgrey">1-5 mi</label>
                                <input type="checkbox" id="15" name="15">
                            </div>
                            <div class="checkbox-holder">
                                <label for="510" class="body lightgrey">5-10 mi</label>
                                <input type="checkbox" id="510" name="510">
                            </div>
                            <div class="checkbox-holder">
                                <label for="10" class="body lightgrey">10+ mi</label>
                                <input type="checkbox" id="10" name="10">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="dropdown">
                    <div class="dropdown-text body"><strong>Duration</strong></div>
                    <div class="dropdown-wrapper">
                        <div class="dropdown-inner">
                            <div class="checkbox-holder">
                                <label for="1" class="body lightgrey">0-1 hr</label>
                                <input type="checkbox" id="1" name="1">
                            </div>
                            <div class="checkbox-holder">
                                <label for="12" class="body lightgrey">1-2 hrs</label>
                                <input type="checkbox" id="12" name="12">
                            </div>
                            <div class="checkbox-holder">
                                <label for="2" class="body lightgrey">2+ hrs</label>
                                <input type="checkbox" id="2" name="2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="search-button">Search</button>
    </div>
</form>

<script>
    // Function to open the filtersPopUp
    function openFiltersPopUp() {
        var filtersPopUp = document.getElementById('filtersPopUp');
        filtersPopUp.style.display = 'block';
    }

    // Function to close the filtersPopUp
    function closeFiltersPopUp() {
        var filtersPopUp = document.getElementById('filtersPopUp');
        filtersPopUp.style.display = 'none';
    }

    // Add a click event listener to open the filtersPopUp
    document.getElementById('openFiltersButton').addEventListener('click', openFiltersPopUp);

    // Add a click event listener to close the filtersPopUp
    document.getElementById('closeFiltersButton').addEventListener('click', closeFiltersPopUp);
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