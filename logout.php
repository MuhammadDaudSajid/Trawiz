<?php
session_start();  // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or home page after logout
header("Location: login.php");  // You can redirect to the login page or home page
exit();
?>
