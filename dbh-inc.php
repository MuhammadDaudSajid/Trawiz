<?php
$serverName = "localhost";
$dbUsername = "root";    // Default username for local server
$dbPassword = "";        // Default password for local server
$dbName = "TravWiz";     // Your database name

// Create connection
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
