<?php
    // Start the session
    session_start();

    // Check if the username is set in the session
    if(isset($_SESSION['username'])) {
        // Display the username
        echo "Welcome, " . $_SESSION['username'];
    } else {
        // If the username is not set, display a default message
        echo "Welcome, Guest";
    }
?>
