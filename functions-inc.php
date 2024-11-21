<?php

// Check if any field is empty
function emptyInputSignup($email, $username, $pwd, $pwdconfirm) {
    return empty($email) || empty($username) || empty($pwd) || empty($pwdconfirm);
}

// Validate username (must contain both alphabets and numbers)
function invalidUid($username) {
    return !preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,}$/", $username); // At least 5 chars, 1 letter, and 1 number
}

// Validate email format
function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);  // Standard email format check
}

// Validate password (must have at least one uppercase letter, one lowercase letter, one digit, one special character, and at least 8 characters)
function invalidPassword($password) {
    return !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password); // Checks for password complexity
}

// Check if passwords match
function pwdMatch($pwd, $pwdconfirm) {
    return $pwd !== $pwdconfirm;  // If passwords don't match, return true (error case)
}

// Check if the username or email already exists in the database
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM login WHERE usersuid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../mainLogin/animlogin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;  // Username or email exists
    } else {
        return false;  // Username and email are available
    }

    mysqli_stmt_close($stmt);
}

// Create user in the database
function createUser($conn, $email, $username, $pwd) {
    $sql = "INSERT INTO login (usersEmail, usersuid, userspwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../mainLogin/animlogin.php?error=stmtfailed");
        exit();
    }

    // Hash the password before storing it
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../mainLogin/animlogin.php?error=none");  // Successful signup
    exit();
}

// Check if the username or password is empty for login
function emptyInputLogin($username, $pwd) {
    return empty($username) || empty($pwd);
}

// Check if the username exists and validate the password
function loginUser($conn, $username, $pwd) {
    // First, check if the user exists
    $uidExists = uidExists($conn, $username, $username);  // Check by username or email

    if ($uidExists === false) {
        header("location: login.php?error=invalidcredentials");
        exit();
    }

    // If the username exists, verify the password
    $pwdHashed = $uidExists["userspwd"];  // Get the hashed password from the database
    $checkPwd = password_verify($pwd, $pwdHashed);  // Verify the entered password against the hash

    // If password is incorrect
    if ($checkPwd === false) {
        header("location: login.php?error=wrongpassword");
        exit();
    } else {
        // If password matches, create the session and log the user in
        session_start();
        $_SESSION["usersid"] = $uidExists["usersid"];  // Store user ID in session
        $_SESSION["usersuid"] = $uidExists["usersuid"];  // Store username in session
        header("location: loggedinhome.php");  // Redirect to logged in home page
        exit();
    }
}
