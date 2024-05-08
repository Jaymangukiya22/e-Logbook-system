<?php
session_start(); 

// Check if the session has been started
if (isset($_SESSION)) {
    // Destroy the session
    session_destroy();
}

// Redirect to the desired page
header("Location: driver.php");
exit();
?>
