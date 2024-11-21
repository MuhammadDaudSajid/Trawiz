<?php
    session_start();
?>

<?php
    // Error handling for signup and login errors
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username</p>";
        }
        else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords don't match!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong! Try again!</p>";
        }
        else if ($_GET["error"] == "usernametaken") {
            echo "<p>Try another username, it’s already taken.</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>Successfully Signed Up!</p>";
        }
        else if ($_GET["error"] == "wrongpassword") {
            echo "<p>Wrong password! Please try again.</p>";
        }
        else if ($_GET["error"] == "invalidcredentials") {
            echo "<p>Invalid credentials. Please check your username/email and password.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Dual Login / Signup Form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
    <link rel="stylesheet" href="../css/login.css" />
  </head>
  <body>
    <section>
      <div class="container" id="container">
        <!-- Sign Up Form -->
        <div class="form-container sign-up-container">
          <form action="signup-inc.php" method="POST">
            <h1>Sign Up</h1>
            <span>Or use your Email for registration</span>

            <label>
              <input type="email" name="email" placeholder="Email" required />
            </label>
            <label>
              <input type="text" name="uid" placeholder="Username" required />
            </label>
            <label>
              <input type="password" name="pwd" placeholder="Password" required />
            </label>
            <label>
              <input type="password" name="pwdconfirm" placeholder="Confirm Password" required />
            </label>

            <button type="submit" name="submit" style="margin-top: 9px">Sign Up</button>
          </form>
        </div>

        <!-- Login Form -->
        <div class="form-container sign-in-container">
          <form action="login-inc.php" method="POST">
            <h1>Login</h1>

            <label>
              <input type="text" name="uid" placeholder="Username or Email" required />
            </label>
            <label>
              <input type="password" name="pwd" placeholder="Password" required />
            </label>
            <a href="#">Forgot your password?</a>
            <button name="login">Login</button>
          </form>
        </div>

        <!-- Overlay to switch between Sign Up and Login -->
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Login</h1>
              <p>Login here if you already have an account</p>
              <button class="ghost mt-5" id="signIn">Login</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Create an Account!</h1>
              <p>Sign up if you still don't have an account...</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Include Bootstrap JS and custom JS for interactivity -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
    <script src="../js/login.js"></script>
  </body>
</html>
