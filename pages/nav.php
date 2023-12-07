<?php
    session_start();
    $mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

    if ($mysql->connect_error) {
        die("Connection failed: " . $mysql->connect_error);
    }

    // Check if the user is logged in
    if (isset($_SESSION["login"]) === false) {
        // User is not logged in
        $path = '../pages/login.php';
    } else {
        $path = '../pages/profilepage.php';
    }
    ?>
<div class="nav">
        <div class="logo">
            <a href="../index.php"><img src="../public/assets/icons/green logo.png"></a>
        </div>
        <div class="nav-items">
            <text class="body bold"><a href="../pages/groupPage.php">Groups</a></text>
            <text class="body bold">
                <a href="<?php echo $path; ?>">
                    <img src="../public/assets/images/profile-picture.png" style="width:3rem;">
                </a>
            </text>
        </div>
 </div>