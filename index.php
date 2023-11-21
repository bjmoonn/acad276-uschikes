<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USC Hikes</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/typography.css" type="text/css">
    <link rel="stylesheet" href="css/colors.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="nav">
        <div class="logo">
            <img src="public/assets/icons/green logo.png">
        </div>
        <div class="nav-items">
            <text class="body bold">Map</text>
            <text class="body bold">Groups</text>
            <text class="body bold">Profile</text>
        </div>
    </div>
    <div class="headline">
        <div class="title">Hike On!</div>
        <div class="body lightgrey">Thhe ultimate hiking guide for USC students</div>
    </div>
    <form action="pages/results.php" method="get">
        <div class="bigger-filter-container">
            <div class="filter-container">
                <div class="dropdown-groups">
                    <div class="dropdown">
                        <div class="dropdown-text body">Difficulty</div>
                        <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">

                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Distance from USC</div>
                        <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Length</div>
                        <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Duration</div>
                        <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                </div>
            </div>
            <button class="search-button">Search</button>
        </div>
    </form>
</div>

<div class="browse">
    <div class="heading">
        <h3>All Hikes</h3>
    </div>
            <div class="hike-row">
                <?php
                $mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");
                if ($mysql->connect_error) {
                    die("Connection failed: " . $mysql->connect_error);
                }
                $sql = "SELECT * FROM mainView";
                $result = $mysql->query($sql);
                if ($result->num_rows > 0) {
                    while($currentrow = $result->fetch_assoc()) {
                        // PHP logic
                        echo '
                            <div class="hike-individual">
                                <div class="hike-thumbnail">
                                    <img src="public/assets/images/' . $currentrow["imageURL"] . '" class="hikeDisplayImg">
                                </div>
                                <div class="hike-description">
                                    <div class="body hike-reviewer">' . $currentrow["lattitude"] . ' N, ' . $currentrow["longitude"] . ' W' . '</div>
                                    <div class="body">' . $currentrow["name"] . '</div>
                                    <div class="body">' . $currentrow["length"] . ' miles</div>
                                    <div class="body">' . $currentrow["duration"] . ' hr</div>
                                    <div class="hike-difficulty body" id="'. $currentrow["difficulty"] .'">
                                        ' . $currentrow["difficulty"] . '
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                } else {
                    echo "<div class='body'>0 results</div>";
                }
                $mysql->close();
                ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <img src="public/assets/icons/logotype bottom.png" id="bottomLogo">
            <div class="body">Acad 276: Dev II</div>
        </div>
    </div>

<script>
    const dropdowns = document.querySelectorAll(".filter-label");

    for (const dropdown of dropdowns) {
        dropdown.addEventListener("mouseover", function() {
            this.querySelector(".dropdown-wrapper").style.display = "block";
        });

        dropdown.addEventListener("mouseout", function() {
            this.querySelector(".dropdown-wrapper").style.display = "none";
        });
    }
</script>

</body>
</html>
