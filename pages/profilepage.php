<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css">
        <link rel="stylesheet" href="../css/typography.css" type="text/css">
        <link rel="stylesheet" href="../css/colors.css" type="text/css">
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
                    <text class="body bold"><a href="../pages/map-page.php">Map</a></text>
                    <text class="body bold"><a href="../pages/groupPage.php">Groups</a></text>
                    <text class="body bold"><a href="../pages/login.php">Log-in</a></text>
                    <text class="body bold"><a href="../pages/profilepage.php">Profile</a></text>
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

                <!-- SLIDER -->
                <div class = "tab-indicator"></div>

                <!-- DYNAMIC BODY TEXT (FOR ALL TABS) -->
                <div class = "tab-body">

                    <!-- SAVED -->
                    <div class = "active">
                        <h3>Your Saved Hikes</h3>
                        <p>
                            No saved hikes.
                        </p>
                    </div>


                    <!-- COMPLETED -->
                    <div>
                        <h3>Your Completed Hikes</h3>
                        <p>No completed hikes. Start Hiking-On!</p>
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

                            <label for="email">Email: </label>
                            <input type="email" id="email" name="email" required><br><br>

                            <label for="major">Major: </label>
                            <input type="text" id="major" name="major" required><br><br>

                            <label for="year">Graduation Year: </label>
                            <input type="text" id="year" name="year" required><br><br>

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

                    <!-- grad year -->
                    <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                        <section style="font-size:1rem;font-weight:bold;">Graduation Year</section>
                        <p><hr style="width:100%; margin:auto;"></p>
                        <section style="margin-left:2rem; color:#999999;">2026</section>
                    </section>
                    </div>

                    <!-- MY REVIEWS -->
                    <div>
                        <div class="reviews-holder">
                            <h3>Reviews</h3>
                            <div class="reviews-row">
                                <div class="review">
                                    <div class="review-inner">
                                        <div class="reviewer">
                                            <div class="profile">
                                                <img src="../public/assets/icons/profile-pic.svg">
                                            </div>
                                            <div class="reviewer-info">
                                                <text>Hamin J.</text>
                                            </div>
                                        </div>
                                        <text class="copy1">This was a super fun hike! Best to go in the morning when its less crowded. Also really liked the view at the top of the trail. Really hard to beat it!</text>
                                        <div class="stars">
                                            <img src="../public/assets/icons/star.svg" class="icon">
                                            <img src="../public/assets/icons/star.svg" class="icon">
                                            <img src="../public/assets/icons/star.svg" class="icon">
                                            <img src="../public/assets/icons/star.svg" class="icon">
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
    <img class="footer-logo" src="public/assets/icons/logotype bottom.png">
    <div class="footer-links">
        <a href="../pages/teampage.php">Team</a>
        <a href="../pages/faq.html">FAQ</a>
    </div>
</div>

        <script>
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
