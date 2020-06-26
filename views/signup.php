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
    <title>TodoList | Sign up</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="et-hero-tabs"  style="z-index:unset">
        <div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="../index.php">TodoList</a>
        <a class="et-hero-tab" href="../index.php">Home</a>
        <a class="et-hero-tab" href="signup.php">Signup</a>
        <a class="et-hero-tab" href="signin.php">Signin</a>
        <!-- <a class="et-hero-tab" href="#tab-other">Other</a> -->
        <span class="et-hero-tab-slider"></span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="container mt-4 col-sm-12 col-md-6 col-lg-4">
                <?php 
                    // Set Signin and Signup Errors 
                    if (!isset($_SESSION['signup_errors'])){
                        echo "";
                    }else{
                        echo $_SESSION['signup_errors'];
                    }
                ?>
                <h2 class="text-muted">Sign Up</h2>
                <form method="POST" action="../controllers/SignupController.php" class="mt-4" id="signup">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                    <input type="text" class="form-control mt-3" name="firstname" id="firstname" placeholder="Enter firstname" required>
                    <input type="text" class="form-control mt-3" name="lastname" id="lastname" placeholder="Enter lastname" required>
                    <input type="email" class="form-control mt-3" name="email" id="email" placeholder="Enter email" required>
                    <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Password" required>
                    <input type="text" class="form-control mt-3" name="photo" id="photo" placeholder="Enter picture url" required>
                    <button type="submit" class="btn bg-primary mt-3 btn-outline-primary text-white w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>