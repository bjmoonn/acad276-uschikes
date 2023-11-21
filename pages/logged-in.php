<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["login"]) === true) {
    // User is logged in
    $username = $_SESSION['email'];
    ?>

    <!-- Floating overlay with welcome message -->
    <div class="overlay">
        Welcome <?php echo $username; ?>
    </div>

    <script>
        // Display the overlay after the page has loaded
        window.addEventListener('load', function () {
            document.querySelector('.overlay').classList.add('show');
        });
    </script>

    <?php
} else {
    // User is not logged in, you can redirect them to the login page or do other actions
    echo "User not logged in";
}
?>
