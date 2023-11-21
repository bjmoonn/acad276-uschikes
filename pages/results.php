<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USC Hikes</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="stylesheet" href="../css/typography.css" type="text/css">
    <link rel="stylesheet" href="../css/colors.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
    <div class="nav">
        <div class="logo">
            <img src="../public/assets/icons/green logo.png">
        </div>
        <div class="nav-items">
            <text class="copy1">Map</text>
            <text class="copy1">Groups</text>
            <text class="copy1">Profile</text>
        </div>
    </div>
    <form action="../pages/results.php" method="get">
        <div class="bigger-filter-container">
            <div class="filter-container">
                <div class="dropdown-groups">
                    <div class="dropdown">
                        <div class="dropdown-text body">Difficulty</div>
                        <img src="../public/assets/icons/CaretDown.svg" class="dropdown-button">

                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Distance from USC</div>
                        <img src="../public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Length</div>
                        <img src="../public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-text body">Duration</div>
                        <img src="../public/assets/icons/CaretDown.svg" class="dropdown-button">
                    </div>
                </div>
            </div>
            <button class="search-button">Search</button>
        </div>
    </form>

</div>

<div class="browse">
    <div class="section-title">
        <h3>Search Results</h3>
    </div>
    <div class="hike-row">

        <?php
        $mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

        if ($mysql->connect_error) {
            die("Connection failed: " . $mysql->connect_error);
        }

        $sql = "SELECT * FROM mainView ";
        if(isset($_REQUEST['1']) || isset($_REQUEST['2']) || isset($_REQUEST['12']) || isset($_REQUEST['Easy']) || isset($_REQUEST['Hard']) || isset($_REQUEST['Moderate']) || isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510']) || isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510'])){
            $sql .= "WHERE ";
        }
        //Difficulty
        if(isset($_REQUEST['Easy'])){
            $sql .= "(difficulty = 'Easy' ";
            if(isset($_REQUEST['Moderate'])){
                $sql .= "OR difficulty = 'Moderate' ";
            }
            if(isset($_REQUEST['Hard'])){
                $sql .= "OR difficulty = 'Hard' ";
            }
            if(isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510'])){
                $sql .= ") AND ";
            }
        }
        else if(isset($_REQUEST['Moderate'])){
            $sql .= "(difficulty = 'Moderate' ";
            if(isset($_REQUEST['Hard'])){
                $sql .= "OR difficulty = 'Hard' ";
            }
            if(isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510'])){
                $sql .= ") AND ";
            }
        }
        else if(isset($_REQUEST['Hard'])){
            $sql .= "(difficulty = 'Hard' ";
            if(isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510'])){
                $sql .= ") AND ";
            }
        }

        //Length
        if(isset($_REQUEST['15'])){
            $sql .= "(length <= 5 ";
            if(isset($_REQUEST['510'])){
                $sql .= "OR (length >= 5 AND length <= 10) ";
            }
            if(isset($_REQUEST['10'])){
                $sql .= "OR 10 <= length ";
            }
            if(isset($_REQUEST['1']) || isset($_REQUEST['2']) || isset($_REQUEST['12'])){
                $sql .= ") AND ";
            }
        }
        else if(isset($_REQUEST['510'])){
            $sql .= "((length >= 5 AND length <= 10) ";
            if(isset($_REQUEST['10'])){
                $sql .= "OR 10 <= length ";
            }
            if(isset($_REQUEST['1']) || isset($_REQUEST['2']) || isset($_REQUEST['12'])){
                $sql .= ") AND ";
            }
        }
        else if(isset($_REQUEST['50'])){
            $sql .= "(10 <= length ";
            if(isset($_REQUEST['1']) || isset($_REQUEST['2']) || isset($_REQUEST['12'])){
                $sql .= ") AND ";
            }
        }

        //Duration
        if(isset($_REQUEST['1'])){
            $sql .= "(duration <= 1 ";
            if(isset($_REQUEST['12'])){
                $sql .= "OR (duration >= 1 AND duration <= 2) ";
            }
            if(isset($_REQUEST['2'])){
                $sql .= "OR 2 <= duration ";
            }
        }
        else if(isset($_REQUEST['12'])){
            $sql .= "((duration >= 1 AND duration <= 2) ";
            if(isset($_REQUEST['2'])){
                $sql .= "OR 2 <= duration ";
            }
        }
        else if(isset($_REQUEST['2'])){
            $sql .= "(2 <= duration ";
        }

        if(isset($_REQUEST['1']) || isset($_REQUEST['2']) || isset($_REQUEST['12']) || isset($_REQUEST['Easy']) || isset($_REQUEST['Hard']) || isset($_REQUEST['Moderate']) || isset($_REQUEST['15']) || isset($_REQUEST['10']) || isset($_REQUEST['510']) || isset($_REQUEST['15']) || isset($_REQUEST['1']) || isset($_REQUEST['10']) || isset($_REQUEST['510'])){
            $sql .= ");";
        }

        $result = $mysql->query($sql);

        if ($result) {
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
                    <text class="copy1">' . $currentrow["duration"] . ' hr</text>
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
    <img src="../public/assets/icons/logotype bottom.png"  id="bottomLogo">
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