<?php
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['user-image'] = null;
    // $_SESSION['postID'] = null;
    // $_SESSION['email'] = null;
    // $_SESSION['UID'] = null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TodoList - Home</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="shortcut icon" href="img/logo.jpg"  type="image/x-icon">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="et-hero-tabs">
            <h1>Welcome to TodoList</h1>
            <h3>Where you can manage tasks</h3>
            <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href=".">TodloList</a>
            <a class="et-hero-tab" href=".">Home</a>
            <a class="et-hero-tab" href="./views/signup.php">Signup</a>
            <a class="et-hero-tab" href="./views/signin.php">Signin</a>
            <!-- <a class="et-hero-tab" href="#tab-other">Other</a> -->
            <span class="et-hero-tab-slider"></span>
            </div>
        </nav>

        <!-- <script src="js/validation.js"></script> -->
    </body>
</html>