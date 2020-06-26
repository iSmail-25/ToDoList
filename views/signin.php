<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <title>Todolist | Sign in</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="et-hero-tabs" style="z-index:unset">
            <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="../index.php">TodoList</a>
            <a class="et-hero-tab" href="../index.php">Home</a>
            <a class="et-hero-tab" href="signup.php">Signup</a>
            <a class="et-hero-tab" href="login.php">Signin</a>
            <!-- <a class="et-hero-tab" href="#tab-other">Other</a> -->
            <span class="et-hero-tab-slider"></span>
            </div>
        </nav>

        <div class="container mt-4 col-sm-12 col-md-6 col-lg-4">
            <div class="container">
                <?php 
                    // Set Signin and Signup Errors 
                    if (!isset($_SESSION['signin_errors'])){
                        echo "";
                    }else{
                        echo $_SESSION['signin_errors'];
                    }
                ?>
                <h2 class="text-muted">Login</h2>
                <form method="POST" action="../controllers/SigninController.php" class="mt-4" id="signin">
                    <div class="form-group">
                        <label for="signin-email">Email address</label>
                        <input type="email" class="form-control" name="email" id="signin-email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="signin-password">Password</label>
                        <input type="password" class="form-control" name="password" id="signin-password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="text-white bg-primary btn-outline-primary  btn w-100">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>