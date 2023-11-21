<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USC Hikes</title>
    <link rel="stylesheet" href="globals.css" type="text/css">
    <link rel="stylesheet" href="typography.css" type="text/css">
    <link rel="stylesheet" href="colors.css" type="text/css">
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

            
    <form action="results.php" method="get">
        <div class="filters-holder">
            <div class="filter-label" id="difficulty">
                <text>Difficulty </text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox1" class="copy1">Easy</label>
                            <input type="checkbox" id="Easy" name="Easy">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox2" class="copy1">Moderate</label>
                            <input type="checkbox" id="Moderate" name="Moderate">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDifficultyCheckbox3" class="copy1">Hard</label>
                            <input type="checkbox" id="Hard" name="Hard">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>Distance from USC </text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox1" class="copy1">1-5 mi</label>
                            <input type="checkbox" id="15Box" name="15Box">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox2" class="copy1">5-20 mi</label>
                            <input type="checkbox" id="520Box" name="520Box">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myDistanceCheckbox3" class="copy1">20+ mi</label>
                            <input type="checkbox" id="20Box" name="20Box">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>Length </text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox1" class="copy1">1-5 mi</label>
                            <input type="checkbox" id="15" name="15">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox2" class="copy1">5-10 mi</label>
                            <input type="checkbox" id="510" name="510">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox3" class="copy1">10+ mi</label>
                            <input type="checkbox" id="10" name="10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical-lines"></div>
            <div class="filter-label">
                <text>  Duration </text>
                <img src="public/assets/CaretDown.svg" class="filter-icon">
                <div class="dropdown-wrapper">
                    <div class="dropdown-inner">
                        <div class="checkbox-holder">
                            <label for="myDurationCheckbox1" class="copy1">0-1 hr</label>
                            <input type="checkbox" id="1" name="1">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox2" class="copy1">1-2 hrs</label>
                            <input type="checkbox" id="12" name="12">
                        </div>
                        <div class="checkbox-holder">
                            <label for="myLengthCheckbox3" class="copy1">2+ hrs</label>
                            <input type="checkbox" id="2" name="2">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value = "Search" class="search-button">
        </div>
    </form>
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
                    <text class="location" >' . $currentrow["lattitude"] . ' N, ' . $currentrow["longitude"] . ' W' . '</text>
                    <text class="copy1">' . $currentrow["name"] . '</text>
                    <text class="copy2">' . $currentrow["length"] . ' miles</text>
                    <text class="copy2">' . $currentrow["duration"] . ' hr</text>
                </div>
                <div class="hike-difficulty" id="'. $difficulty .'">
                    <text class="copy2">' . $currentrow["difficulty"] . '</text>
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