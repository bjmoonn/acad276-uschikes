<?php
$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

session_start();

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="typography.css" type="text/css">
    <link rel="stylesheet" href="colors.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <style>
        .background {
            padding-bottom:0;
        }
        .tabs {
            width: 100%;
            position: relative;
        }

        .tabs .tab-header {
            height: 4rem;
            display: flex;
            align-items: center;
        }
        .tabs .tab-header > div {
            width: calc(100% / 4);
            text-align: center;
            cursor: pointer;
            font-size: 1rem;
            text-transform: uppercase;
            outline: none;
        }
        .tabs .tab-header > div.active {
            font-weight: bold;
            color: #3E5D15;

        }
        .tabs .tab-indicator {
            position: absolute;
            width: calc(100%/4);
            height: .3rem;
            background: #3E5D15;
            left:0;
            border-radius: 1rem;
            transition:all 500ms ease-in-out;
        }

        .tabs .tab-body {
            position: relative;
            min-height:75%;
            padding: 2rem 1rem;
        }
        .tabs .tab-body > div {
            position: absolute;
            top: -200%;
            opacity:0;
            margin-top:1rem;
            transform:scale(0.9);
            transition: opacity 500ms ease-in-out 0ms,
            transform 500ms ease-in-out 0ms;
            width:100%;
        }
        .tabs .tab-body >div.active {
            top:0;
            opacity:1;
            transform:scale(1);
            margin-top:0;
        }
        .profilepage-body {
            width:100%;
            min-height: 50%;
        }
        /*reviews css*/
        .reviews-holder{
            padding-bottom:5rem;
        }
        .reviews-row{
            display: flex;
            align-items: flex-start;
            gap: 2.5rem;
            align-self: stretch;
        }
        .review{
            display: flex;
            padding: 1.5rem 2.5rem;
            align-items: flex-start;
            gap: 2.5rem;
            flex: 1 0 0;
            border-radius: 1.25rem;
            border: 1px solid #E5E5E5;
            background: #FFF;
        }
        .review-inner{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 1.25rem;
            align-self: stretch;
        }
        .reviewer{
            display: flex;
            align-items: center;
            flex-direction:row;
            gap: 0.5rem;
            flex: 1 0 0;
        }
        .stars{
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        #editProfile {
            display: inline-flex;
            padding: 1rem 1.5rem;
            align-items: center;
            gap: .25rem;
            border-radius: 2rem;
            border: 1px solid var(--ui-border, #E5E5E5);
            background: var(--ui-white, #FFF);
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
        }
        #editProfile:hover {
            background: #E5E5E5;
        }
        #overlay {
            position: fixed;
            display: none;
            width: 70%;
            min-height: 95%;
            background-color: white;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
            border-radius: 2rem;
            z-index: 2;
            cursor: pointer;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
        }

        form {
            padding-left:3rem;
            padding-right:3rem;
            padding-bottom:3rem;
        }


        @media only screen and (max-width: 480px) {
            .tabs .tab-header > div {
                font-size: 0.9rem;
            }

            .tabs .tab-indicator {
                width: calc(100% / 4);
            }

            .tabs .tab-body > div {
                padding: 2rem 1rem 1rem 1rem;
            }
        }

    </style>
</head>
<body>
<!-- NAV -->
<div class="background">
    <div class="nav">
        <div class="logo">
            <a href="../index.php"><img src="../public/assets/icons/green logo.png"></a>
        </div>
        <div class="nav-items">
            <text class="body bold"><a href="../pages/groupPage.php">Groups</a></text>
            <text class="body bold">
                <?php
                session_start();

                // Check if the user is logged in
                if (isset($_SESSION["login"]) === false) {
                    // User is not logged in
                    $path = '../pages/login.php';
                } else {
                    $path = '../pages/profilepage.php';
                }
                ?>
                <a href="<?php echo $path; ?>"><img src="../public/assets/icons/profile-pic.svg" style="width:3rem;"></a>
        </div>
    </div>
</div>

<!-- ACCOUNT NAME. PHOTO, AND BACKGROUND IMAGE-->
<!-- BACKGROUND IMAGE -->
<div class="background-image" style="text-align:center;display:flex;justify-content:center; align-items:center;">
    <img src = "../public/assets/images/background-profilepage1.jpeg" style="width:70%;height:15rem;border-radius:2rem;">
</div>
<div class = "profilepage" style="margin-left:15%; margin-right:15%;margin-top:-3%;">

    <!-- ACCOUNT NAME AND PHOTO-->
    <div class = "account-header" style="padding-bottom:3rem;">
        <div style="text-align:center;">
            <img src="../public/assets/icons/profile-pic.svg" style="width:6rem;"><br><br>Hamin Jin</div>
    </div>

    <div class = "profilepage-body">

        <!-- TAB SLIDER SECTION -->
        <div class = "tabs">
            <div class = "tab-header">
                <div class = "active">
                    Saved
                </div>
                <div>
                    Completed
                </div>
                <div>
                    Settings
                </div>
                <div>
                    My Reviews
                </div>
            </div>


                    <!-- SAVED -->
                    <div class = "active">
                        <h3>Your Saved Hikes</h3>
                        <p>
                            <?php
                            $sql_saved = "SELECT * FROM favorites, mainHikes";
                            $result_saved = $mysql->query($sql_saved);

                            if($result_saved->num_rows > 0) {
                                while($currentrow = $result_saved->fetch_assoc()) {
                                    echo '
                                        <div class="hike-individual">
                                            <div class="hike-thumbnail">
                                                <a href="pages/individual-hike.php"><img src="../public/assets/images/' . $currentrow["imageURL"] . '" class="hikeDisplayImg"></a>
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
                                echo "No saved hikes.";
                            }
                            ?>
                        </p>
                    </div>


                    <!-- COMPLETED -->
                    <div>
                        <h3>Your Completed Hikes</h3>
                        <p>
                            <?php
                            $sql_completed = "SELECT * FROM completedHikes, mainHikes";
                            $result_completed = $mysql->query($sql_completed);

                            if($result_completed->num_rows > 0) {
                                while($currentrow = $result_completed->fetch_assoc()) {
                                    // PHP logic
                                    echo '
                                        <div class="hike-individual">
                                            <div class="hike-thumbnail">
                                                <a href="pages/individual-hike.php"><img src="../public/assets/images/' . $currentrow["imageURL"] . '" class="hikeDisplayImg"></a>
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
                                echo "No completed hikes. Start Hiking-On!";
                            }
                            ?>
                        </p>
                    </div>

                <!-- SETTINGS -->
                <div>
                    <h3>Profile</h3>
                    <p><hr></p>

                    <section style="display: flex; padding:.5rem;justify-content: space-between; align-items: center; margin:auto;width: 90%; position: relative;">
                        <section style="display: flex; align-items: center;">
                            <img src="../public/assets/icons/profile-pic.svg" style="width: 3.5rem; margin-right: 3rem;">
                            <section style="position: relative;">Hamin Jin</section>
                        </section>
                        <section id="editProfile" style="position: relative;" onclick="on()">Edit Profile</section>
                    </section>

                    <!-- edit profile overlay -->
                    <section id="overlay">
                        <h3 style="padding-left:2rem; padding-top:1rem; padding-bottom:0.5rem;">Edit Your Information:</h3>
                        <!--                        <img src = "../public/assets/icons/light-x.svg" style="position: absolute; top: 1rem; right: 1rem; cursor: pointer;" onclick="off()">-->
                        <img src = "light-x.svg" style="position: absolute; top: 1rem; right: 1rem; cursor: pointer;" onclick="off()">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <label for="name">Name: </label>
                            <input type="text" id="name" name="name" required><br><br>

                            <label for="major">Major: </label>
                            <input type="text" id="major" name="major" required><br><br>

                            <label for="year">Grade: </label>
                            <select id="year" name="year" required>
                                <option value="" disabled selected></option>
                                <option value="freshman">Freshman</option>
                                <option value="sophomore">Sophomore</option>
                                <option value="junior">Junior</option>
                                <option value="senior">Senior</option>
                                <option value="graduate">Graduate</option>
                                <option value="professor">Professor</option>
                            </select><br><br>

                            <label for="gender">Gender: </label>
                            <select id="gender" name="gender" required>
                                <option value="" disabled selected></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select><br><br>

                            <label for="profilePicture">Upload Profile Picture: </label>
                            <input type="file" id="profilePicture" name="profilePicture" accept="image/*"><br><br>

                            <label for="backgroundPicture">Upload Background Picture: </label>
                            <input type="file" id="backgroundPicture" name="backgroundPicture" accept="image/*"><br><br>

                            <button type="submit" class="search-button" style="float:right; margin-bottom:2rem;">Submit</button>
                        </form>
                    </section>

                    <!-- username -->
                    <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                        <section style="font-size:1rem;font-weight:bold;">Email Address</section>
                        <p><hr style="width:100%; margin:auto;"></p>
                        <section style="margin-left:2rem; color:#999999;">jinnyjin@usc.edu</section>
                    </section>

                    <!-- email -->
                    <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                        <section style="font-size:1rem;font-weight:bold;">Major</section>
                        <p><hr style="width:100%; margin:auto;"></p>
                        <section style="margin-left:2rem; color:#999999;">Business</section>
                    </section>

                    <!-- grade -->
                    <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                        <section style="font-size:1rem;font-weight:bold;">Grade</section>
                        <p><hr style="width:100%; margin:auto;"></p>
                        <section style="margin-left:2rem; color:#999999;">Sophomore</section>
                    </section>
                    <!-- MY REVIEWS -->
                    <div>
                        <div class="reviews-holder">
                            <h3>Reviews</h3>
                            <div class="reviews-row">
                                <div class="review">
                                    <div class="review-inner">
                                        <?php
                                            $sql_reviews = "SELECT comments, rating, fullName, profPicURL FROM userReviews, users, fullNames, profPics WHERE hikeID = " . $_REQUEST["hikeid"];
                                            $result_reviews = $mysql->query($sql_reviews);

                                            if($result_reviews->num_rows > 0) {
                                                while($currentrow = $result_reviews->fetch_assoc()) {
                                                    echo '
                                                        <div class="reviewer">
                                                            <div class="profile">
                                                                <img src = '. $currentrow["profPicURL"]. '>
                                                            </div>
                                                            <div class="reviewer-info">
                                                                <text>' . $currentrow["fullName"] . '</text>
                                                            </div>
                                                        </div>
                                                        <text class="copy1">' . $currentrow["comments"] . '</text>
                                                        <div class="stars">
                                                            <img src="../public/assets/icons/star.svg" class="icon">
                                                            <img src="../public/assets/icons/star.svg" class="icon">
                                                            <img src="../public/assets/icons/star.svg" class="icon">
                                                            <img src="../public/assets/icons/star.svg" class="icon">
                                                        </div>
                                                    ';
                                                }
                                            } else {
                                                echo "No reviews written. Comment your thoughts on hikes you have completed!";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div></div>

<div class="footer">
    <img src="../public/assets/icons/logotype bottom.png" id="bottomLogo">
    <div class="body">Acad 276: Dev II</div>
    <a href="../pages/TeamPage.php">Team</a>
    <div class="body"><a href="../pages/faq.html">FAQ</a></div>
</div>

<script>
    // tab slider
    let tabHeader = document.getElementsByClassName("tab-header")[0];
    let tabIndicator = document.getElementsByClassName("tab-indicator")[0];
    let tabBody = document.getElementsByClassName("tab-body")[0];

    let tabsPane = tabHeader.getElementsByTagName("div");

    for(let i=0; i<tabsPane.length; i++) {
        tabsPane[i].addEventListener("click", function() {
            tabHeader.getElementsByClassName("active")[0].classList.remove("active");
            tabsPane[i].classList.add("active");
            tabBody.getElementsByClassName("active")[0].classList.remove("active");
            tabBody.getElementsByTagName("div")[i].classList.add("active");

            tabIndicator.style.left = `calc(calc(100% / 4) * ${i})`;
        });
    }

    // overlay
    function on() {
        document.getElementById("overlay").style.display = "block";
    }
    function off() {
        document.getElementById("overlay").style.display = "none";
    }

</script>
</body>
</html>
