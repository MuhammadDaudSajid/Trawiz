<?php

if (isset($_POST["login"])) {

    // Collect form data
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh-inc.php';  // Database connection
    require_once 'functions-inc.php';  // Functions for login handling

    // Check if input is empty (either username or password)
    if (emptyInputLogin($username, $pwd)) {
        echo "Error: Fill in all fields!";  // Debugging message
        header("location: login.php?error=emptyinput");
        exit();
    }

    // Call the login function to validate user
    loginUser($conn, $username, $pwd);  // Call the function defined in functions-inc.php

} else {
    header("location: login.php");
    exit();
}
?>
