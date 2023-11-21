<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css">
        <link rel="stylesheet" href="../css/typography.css" type="text/css">
        <link rel="stylesheet" href="../css/colors.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
<!--         <script src="index.js" type="text/javascript" defer></script> -->
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
                    <text class="body bold"><a href="../pages/group-page.php">Groups</a></text>
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
                        Add A Review
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
                            <section class="filterButton" style="position: relative;">Edit Profile</section>
                        </section>

                        <!-- username -->
                        <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                            <section style="font-size:1rem;font-weight:bold;">Username</section>
                            <p><hr style="width:100%; margin:auto;"></p>
                            <section style="margin-left:2rem; color:#999999;">thejinster</section>
                        </section>

                        <!-- email -->
                        <section style=" padding-top:2rem;width:90%;position:relative; align-items: center; margin:auto; ">
                            <section style="font-size:1rem;font-weight:bold;">Email Address</section>
                            <p><hr style="width:100%; margin:auto;"></p>
                            <section style="margin-left:2rem; color:#999999;">jinnyjin@usc.edu</section>
                        </section>
                    </div>

                    <!-- ADD A REVIEW -->
                    <div>
                        <div class = "ReviewForm"><h3>Add a Review</h3></div>

                        <form action="" method="get">
                            <div class="filterButton" id="choose-a-hike" style="float: left; margin-bottom: 20px;">Choose a Hike
                                <img src="../public/assets/icons/CaretDown.svg" class="filter-icon">
                            </div>

                            <div class="review">
                                <textarea type="text" name="review" style="min-width:100%; height:250px; border-radius: 10px;"
                                          placeholder=" Write a Review..."></textarea>
                            </div>
                            <input type="submit" value="Submit" class="filterButton" style="margin-top:20px;float:right">
                        </form>
                    </div>

                </div>
            </div>
        </div></div>

        <div class="footer">
            <img src="../public/assets/icons/logotype bottom.png"  id="bottomLogo">
            <div>
                <text>Acad 276: Dev II</text>
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
        </script>
    </body>
</html>
