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
            <a href="../index.php"><img src="../public/assets/icons/green logo.png"></a>
        </div>
        <div class="nav-items">
            <text class="body bold"><a href="../pages/map-page.php">Map</a></text>
            <text class="body bold"><a href="../pages/groupPage.php">Groups</a></text>
            <text class="body bold"><a href="../pages/login.php">Log-in</a></text>
            <text class="body bold"><a href="../pages/profilepage.php">Profile</a></text>
        </div>
    </div>
    <form action="results.php" method="post">
        <div class="bigger-filter-container">
            <div class="filter-container">
                <div class="dropdown-groups">
                    <div class="dropdown">
                        <div class="dropdown-text body"><strong>Difficulty</strong></div>
                        <div class="dropdown-wrapper">
                            <div class="dropdown-inner">
                                <div class="checkbox-holder">
                                    <label for="myDifficultyCheckbox1" class="copy1 lightgrey">Easy</label>
                                    <input type="checkbox" id="Easy" name="Easy">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myDifficultyCheckbox2" class="copy1 lightgrey">Moderate</label>
                                    <input type="checkbox" id="Moderate" name="Moderate">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myDifficultyCheckbox3" class="copy1 lightgrey">Hard</label>
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
                                    <label for="myDistanceCheckbox1" class="copy1 lightgrey">1-5 mi</label>
                                    <input type="checkbox" id="15Box" name="15Box">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myDistanceCheckbox2" class="copy1 lightgrey">5-20 mi</label>
                                    <input type="checkbox" id="520Box" name="520Box">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myDistanceCheckbox3" class="copy1 lightgrey">20+ mi</label>
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
                                    <label for="myLengthCheckbox1" class="copy1 lightgrey">1-5 mi</label>
                                    <input type="checkbox" id="15" name="15">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myLengthCheckbox2" class="copy1 lightgrey">5-10 mi</label>
                                    <input type="checkbox" id="510" name="510">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myLengthCheckbox3" class="copy1 lightgrey">10+ mi</label>
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
                                    <label for="myDurationCheckbox1" class="copy1 lightgrey">0-1 hr</label>
                                    <input type="checkbox" id="1" name="1">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myLengthCheckbox2" class="copy1 lightgrey">1-2 hrs</label>
                                    <input type="checkbox" id="12" name="12">
                                </div>
                                <div class="checkbox-holder">
                                    <label for="myLengthCheckbox3" class="copy1 lightgrey">2+ hrs</label>
                                    <input type="checkbox" id="2" name="2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="search-button">Search</button>
                </div>
            </div>
        </div>
    </form>

</div>

<div class="browse">
    <div class="heading">
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
                                    <a href="../pages/individual-hike.php"><img src="../public/assets/images/' . $currentrow["imageURL"] . '" class="hikeDisplayImg"></a>
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
            echo "0 results";
        }

        $mysql->close();
        ?>

    </div>

</div>
<br>

<div class="footer">
    <img src="../public/assets/icons/logotype bottom.png" id="bottomLogo">
    <div class="body">Acad 276: Dev II</div>
    <div class="body"><a href="../pages/Team-page.php">The Team</a></div>
    <div class="body"><a href="../faq.html">FAQ</a></div>
</div>

</body>

</html>