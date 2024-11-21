<?php

if (isset($_POST["submit"])) {

    // Collect form data
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdconfirm = $_POST["pwdconfirm"];

    require_once 'dbh-inc.php';  // Database connection
    require_once 'functions-inc.php';  // Functions for validation and user creation

    // Check if input is empty
    if (emptyInputSignup($email, $username, $pwd, $pwdconfirm)) {
        echo "Error: Fill in all fields!";  // Debugging message
        header("location: login.php?error=emptyinput");
        exit();
    }

    // Validate the username (must contain both alphabets and numbers)
    if (invalidUid($username)) {
        echo "Error: Invalid username!";  // Debugging message
        header("location: login.php?error=invaliduid");
        exit();
    }

    // Validate email (must be in a proper email format)
    if (invalidEmail($email)) {
        echo "Error: Invalid email format!";  // Debugging message
        header("location: login.php?error=invalidemail");
        exit();
    }

    // Check if passwords match
    if (pwdMatch($pwd, $pwdconfirm)) {
        echo "Error: Passwords don't match!";  // Debugging message
        header("location: login.php?error=passwordsdontmatch");
        exit();
    }

    // Hash the password before storing it
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Insert data into the login table
    $sql = "INSERT INTO login (usersEmail, usersuid, userspwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Error: Statement failed!";  // Debugging message
        header("location: login.php?error=stmtfailed");
        exit();
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Success: User created!";  // Debugging message
        header("location: login.php?error=none");
        exit();
    } else {
        echo "Error: Data insertion failed!";  // Debugging message
        header("location: login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    header("location: login.php");
    exit();
}
?>
