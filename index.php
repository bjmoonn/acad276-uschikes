<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USC Hikes</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
    <div class="nav">
        <div class="logo">
            <img src="public/assets/green logo.png">
        </div>
        <div class="nav-items">
            <text class="copy1">Map</text>
            <text class="copy1">Groups</text>
            <text class="copy1">Profile</text>
        </div>
    </div>
    <div class="headline">
        <text class="editorial1">Hike On!</text>
        <text class="copy1">The ultimate hiking guide for USC students</text>
    </div>
    <div class="filtersearch-bar">
        <div class="filters-holder">
            <div class="filter-label" id="difficulty">
                <text>Difficulty</text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">

                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox1" class="copy1">Easy</label>
                            <input type="checkbox" id="myDifficultyCheckbox1" name="myDifficultyCheckbox1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox2" class="copy1">Medium</label>
                            <input type="checkbox" id="myDifficultyCheckbox2" name="myDifficultyCheckbox2">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox3" class="copy1">Hard</label>
                            <input type="checkbox" id="myDifficultyCheckbox3" name="myDifficultyCheckbox3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>Distance from USC</text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox1" class="copy1">1-5 mi</label>
                            <input type="checkbox" id="myDistanceCheckbox1" name="myDistanceCheckbox1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox2" class="copy1">5-20 mi</label>
                            <input type="checkbox" id="myDistanceCheckbox2" name="myDistanceCheckbox2">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox3" class="copy1">20+ mi</label>
                            <input type="checkbox" id="myDistanceCheckbox3" name="myDistanceCheckbox3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>Length</text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox1" class="copy1">1-10 mi</label>
                            <input type="checkbox" id="myLengthCheckbox1" name="myLengthCheckbox1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox2" class="copy1">10-20 mi</label>
                            <input type="checkbox" id="myLengthCheckbox2" name="myLengthCheckbox2">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox3" class="copy1">20 mi</label>
                            <input type="checkbox" id="myLengthCheckbox3" name="myLengthCheckbox3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>Duration</text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDurationCheckbox1" class="copy1">30 min</label>
                            <input type="checkbox" id="myDurationCheckbox1" name="myDurationCheckbox1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox2" class="copy1">1 hour</label>
                            <input type="checkbox" id="myDurationCheckbox2" name="myDurationCheckbox2">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox3" class="copy1">5+ hour</label>
                            <input type="checkbox" id="myDurationCheckbox3" name="myDurationCheckbox3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-button">
            Search
        </div>
    </div>
    <!--<div class="dropdown">
        <button class="dropbtn">Dropdown</button>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <label for="myCheckbox">Check me:</label>
            <input type="checkbox" id="myCheckbox" name="myCheckbox">
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>-->

</div>

<div class="browse">
    <div class="section-title">
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
            // output data of each row
            while($currentrow = $result->fetch_assoc()) {
                $difficulty = "wow";
                if($currentrow["difficulty"] == "Easy"){
                    $difficulty = "easyTag";
                }
                else if($currentrow["difficulty"] == "Moderate"){
                    $difficulty = "mediumTag";
                }
                else if($currentrow["difficulty"] == "Hard"){
                    $difficulty = "hardTag";
                }
                echo '
                
                <div class="hike-individual">
            <div class="hike-thumbnail">
                <img src="hikeOnImages/' . $currentrow["imageURL"] . '" class="hikeDisplayImg">
            </div>
            <div class="hike-description">
                <div class="hike-text">
                    <text class="copy1 hike-reviewer" >' . $currentrow["lattitude"] . ' N, ' . $currentrow["longitude"] . ' W' . '</text>
                    <text class="copy1">' . $currentrow["name"] . '</text>
                    <text class="copy1">' . $currentrow["length"] . ' miles</text>
                </div>
                <div class="hike-difficulty" id="'. $difficulty .'">
                    <text class="copy1">' . $currentrow["difficulty"] . '</text>
                </div>
            </div>
        </div>   
                ';
            }
        } else {
            echo "0 results";
        }

        $mysql->close();
        ?>

    </div>

</div>

<div class="footer">
    <img src="public/assets/logotype bottom.png"  id="bottomLogo">
    <div>
        <text>Acad 276: Dev II</text>
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
