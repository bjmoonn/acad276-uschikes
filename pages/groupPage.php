<html>
<head>
    <meta charset="UTF-8">
    <title>USC Hikes:Groups</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="stylesheet" href="../css/typography.css" type="text/css">
    <link rel="stylesheet" href="../css/colors.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">

    <style>
        .background {
            background-image: url('../public/assets/hero-background.png');
            height:40%;
        }
        .filtersbutton {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 40px;
            border-radius: 20px;
            background-color: #3E5D15;
            color: white;
            font-family: "Public Sans";
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
            margin-left: auto;
            margin-top:20px;
        }
        .featuredbox {
            width: 1250px;
            margin-left:auto;
            margin-right:auto;
            margin-top: 40px;
        }

        .featured {
            font-size: 32pt;
            font-weight: bold;
            float:left;
        }

        .groupcard {
            width: 1250px;
            height: 150px;
            background-color: #FDFAF6;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            position: relative;
        }

        .profile-container {
            display: flex;
            justify-content: left;
            align-items: center;
            width:300px;
            height: 50px;
            position: absolute;
            bottom:15;
            left:30;
        }

        .profileIcon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #3498db;
            margin-right: -20px;
            border: 3.33px;
            border-style: solid;
            border-color: #FDFAF6;
            margin-right: -20px;
            overflow: hidden;
            object-fit: cover;
        }

        .hikeTitle {
            font-size: 1.2rem;
            padding-top: 20px;
            padding-left:30px;
        }

        .hikeDistance {
            color: #000000;
            opacity: 50%;
            font-size: 1rem;
            padding-left:30px;
            padding-top: 5px;
        }

        .buttonsContainer {
            width:300px;
            float: right;
            margin-right:30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap:15px;
            margin-top: 50px;
        }

        .detailsButton {
            width:80px;
            height:30px;
            border-color:#3E5D15;
            border-style: solid;
            border-radius: 30px;
            text-align: center;
            color: #3E5D15;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
        }

        .joinGroupButton {
            width:100px;
            height:30px;
            border-color:#3E5D15;
            border-style: solid;
            border-radius: 30px;
            background-color:#3E5D15;
            text-align: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.25);
        }

        .break {
            height:80px;}
        .footer {
            margin-top: 30px;
        }

        .category {
            font-size: 20pt;
            font-weight: bold;
            color:#3E5D15;
            width: 1250px;
            margin:auto;
            padding-top:15px;
        }

    </style>

</head>
<body>

<div class="background">
    <div class="nav">
        <div class="logo">
            <img src="../../green%20logo.png">
        </div>
        <div class="nav-items">
            <text class="copy1">Map</text>
            <text class="copy1">Groups</text>
            <text class="copy1">Profile</text>
        </div>
    </div>
    <div class="headline">
        <text class="title">Groups</text>
        <text class="copy1">Connect with other outdoor Trojans! Join an upcoming hike.</text>
    </div>

    <div class="featuredbox">
        <div class="featured">Featured</div>
        <div class="filtersbutton "> Filters </div>
    </div>
</div>

<div class="break"></div>

    <div>
        <div class="category">Casual</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Hollywood Hike</div>
            <div class="hikeDistance">4.1 mi away • 20 min</div>
            <div class="profile-container">
             <img src="../public/assets/images/profile1.avif" class="profileIcon">
                <img src="../public/assets/images/profile2.webp" class="profileIcon">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile4.webp" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Malibu Adventure</div>
            <div class="hikeDistance">16.2 mi away • 40 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile5.webp" class="profileIcon">
                <img src="../public/assets/images/profile6.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="category">Amateaur</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Desert Fun</div>
            <div class="hikeDistance">100 mi away •  3 hours</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile9.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Runyun Canyon</div>
            <div class="hikeDistance">12.1 mi away • 36 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile1.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
            </div>
        </div>

        <div class="category">Hardcore</div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Temescal Canyon</div>
            <div class="hikeDistance">25.3 mi away • 1 hour 6 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile9.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile5.webp" class="profileIcon">
                <img src="../public/assets/images/profile4.webp" class="profileIcon">
                <img src="../public/assets/images/profile2.webp" class="profileIcon">
            </div>
        </div>

        <div class="groupcard">
            <div class="buttonsContainer">
                <div class="detailsButton"> Details</div>
                <div class="joinGroupButton"> Join Group </div>
            </div>
            <div class="hikeTitle">Group: Climbing Trip! </div>
            <div class="hikeDistance">30.9 mi away • 58 min</div>
            <div class="profile-container">
                <img src="../public/assets/images/profile6.avif" class="profileIcon">
                <img src="../public/assets/images/profile3.avif" class="profileIcon">
                <img src="../public/assets/images/profile7.jpeg" class="profileIcon">
                <img src="../public/assets/images/profile8.jpeg" class="profileIcon">
            </div>
        </div>

    </div>



    <div class="footer">
        <img src="logotype bottom.png"  id="bottomLogo">
        <div>
            <text>Acad 276: Dev II</text>
        </div>
    </div>

</body>
</html>