<?php
session_start();
?>
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
    <?php include "logged-in.php" ?>
    <div class="main">
        <!-- Navigation -->
        <div class="nav">
            <div class="logo">
                <img src="public/assets/icons/green logo.png">
            </div>
            <div class="nav-items">
                <div class="body bold">Map</div>
                <div class="body bold">Groups</div>
                <div class="body bold">Profile</div>
            </div>
        </div>
        <!-- Headline -->
        <div class="headline">
            <div class="title">Hike On!</div>
            <div class="body lightgrey">The ultimate hiking guide for USC students</div>
        </div>
        <!-- Filters -->
        <form action="results.php" method="get">
        <div class="filters-holder">
            <!-- Difficulty Dropdown -->
            <div class="filter-label" id="difficulty">
                <div class="body">Difficulty</div>
                <img src="public/assets/icons/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox1" class="body">Easy</label>
                            <input type="checkbox" id="myDifficultyCheckbox1" name="Easy">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox2" class="body">Moderate</label>
                            <input type="checkbox" id="myDifficultyCheckbox2" name="Moderate">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox3" class="body">Hard</label>
                            <input type="checkbox" id="myDifficultyCheckbox3" name="Hard">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>

            <!-- Distance Dropdown -->
            <div class="filter-label">
                <div class="body">Distance from USC</div>
                <img src="public/assets/icons/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox1" class="body">1-5 mi</label>
                            <input type="checkbox" id="myDistanceCheckbox1" name="15Box">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox2" class="body">5-20 mi</label>
                            <input type="checkbox" id="myDistanceCheckbox2" name="520Box">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox3" class="body">20+ mi</label>
                            <input type="checkbox" id="myDistanceCheckbox3" name="20Box">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>

            <!-- Length Dropdown -->
            <div class="filter-label">
                <div class="body">Length</div>
                <img src="public/assets/icons/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox1" class="body">1-5 mi</label>
                            <input type="checkbox" id="myLengthCheckbox1" name="15">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox2" class="body">5-10 mi</label>
                            <input type="checkbox" id="myLengthCheckbox2" name="510">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox3" class="body">10+ mi</label>
                            <input type="checkbox" id="myLengthCheckbox3" name="10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>

            <!-- Duration Dropdown -->
            <div class="filter-label">
                <div class="body">Duration</div>
                <img src="public/assets/icons/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDurationCheckbox1" class="body">0-1 hr</label>
                            <input type="checkbox" id="myDurationCheckbox1" name="1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDurationCheckbox2" class="body">1-2 hrs</label>
                            <input type="checkbox" id="myDurationCheckbox2" name="12">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDurationCheckbox3" class="body">2+ hrs</label>
                            <input type="checkbox" id="myDurationCheckbox3" name="2">
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" value="Search" class="search-button">
        </div>
    </form>

        <!-- Browse Section -->
        <div class="browse">
            <div class="heading">
                <div class="title">All Hikes</div>
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
        document.addEventListener('DOMContentLoaded', (event) => {
            const dropdowns = document.querySelectorAll(".filter-label");

            dropdowns.forEach(dropdown => {
                const icon = dropdown.querySelector('.filter-icon');
                const dropdownContent = dropdown.querySelector('.dropdown-wrapper');

                icon.addEventListener("mouseover", function() {
                    dropdownContent.style.display = "block";
                });

                icon.addEventListener("mouseout", function() {
                    dropdownContent.style.display = "none";
                });
            });
        });
    </script>
</body>
</html>
