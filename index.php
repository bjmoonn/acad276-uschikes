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
        <form action="pages/results.php" method="get">
            <div class="bigger-filter-container">
                <div class="filter-container">
                    <div class="dropdown-groups">
                        <!-- Difficulty Dropdown -->
                        <div class="dropdown">
                            <div class="dropdown-text body">Difficulty</div>
                            <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                            <div class="dropdown-content">
                                <input type="checkbox" id="Easy" name="Easy"><label for="Easy" class="body">Easy</label><br>
                                <input type="checkbox" id="Moderate" name="Moderate"><label for="Moderate" class="body">Moderate</label><br>
                                <input type="checkbox" id="Hard" name="Hard"><label for="Hard" class="body">Hard</label>
                            </div>
                        </div>
                        <!-- Distance Dropdown -->
                        <div class="dropdown">
                            <div class="dropdown-text body">Distance from USC</div>
                            <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                            <div class="dropdown-content">
                                <input type="checkbox" id="15Box" name="15Box"><label for="15Box" class="body">1-5 mi</label><br>
                                <input type="checkbox" id="520Box" name="520Box"><label for="520Box" class="body">5-20 mi</label><br>
                                <input type="checkbox" id="20Box" name="20Box"><label for="20Box" class="body">20+ mi</label>
                            </div>
                        </div>
                        <!-- Length Dropdown -->
                        <div class="dropdown">
                            <div class="dropdown-text body">Length</div>
                            <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                            <div class="dropdown-content">
                                <input type="checkbox" id="15" name="15"><label for="15" class="body">1-5 mi</label><br>
                                <input type="checkbox" id="510" name="510"><label for="510" class="body">5-10 mi</label><br>
                                <input type="checkbox" id="10" name="10"><label for="10" class="body">10+ mi</label>
                            </div>
                        </div>
                        <!-- Duration Dropdown -->
                        <div class="dropdown">
                            <div class="dropdown-text body">Duration</div>
                            <img src="public/assets/icons/CaretDown.svg" class="dropdown-button">
                            <div class="dropdown-content">
                                <input type="checkbox" id="1" name="1"><label for="1" class="body">0-1 hr</label><br>
                                <input type="checkbox" id="12" name="12"><label for="12" class="body">1-2 hrs</label><br>
                                <input type="checkbox" id="2" name="2"><label for="2" class="body">2+ hrs</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="search-button">Search</button>
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
        // js for handling dropdowns
        const dropdowns = document.querySelectorAll(".dropdown");
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function() {
                this.querySelector(".dropdown-content").classList.toggle('show');
            });
        });

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-button')) {
                let dropdownContents = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdownContents.length; i++) {
                    let openDropdown = dropdownContents[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
