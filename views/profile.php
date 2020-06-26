<?php
    session_start();

    // Import Connection file
    require_once('../config/Connection.php');

    // Define Connection
    $connection = new Connection();

    // Debugging
    // echo "User Email : " . $_SESSION['email'] . "<br>";
    // echo "User Password : " . $_SESSION['password'] . "<br>";
    // echo "User Id : " . $_SESSION['userID'] . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/todolist.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <title>TodoList | Sign up</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="tabs">
            <div class="tabs-container">
            <a class="tab" href="todolist.php">Home</a>
            <a class="tab" href="todolist.php">TodoLists</a>
            <a class="tab" href="newtodolist.php">New Todolist</a>
            <a class="tab" href="profile.php"><img class="user-image" src="<?php echo $_SESSION['user-image'] ?>" alt="Image"> <span class="username text-capitalize"><?php echo $_SESSION['username'] ?></span></a>
            <a class="tab" href="../controllers/logoutController.php">Logout</a>
            <!-- <span class="et-hero-tab-slider"></span> -->
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="container mt-4 col-sm-12 col-md-6 col-lg-4">
                    <?php 
                        // Set Signin and Signup Errors 
                        if (!isset($_SESSION['update_errors'])){
                            echo "";
                        }else{
                            echo $_SESSION['update_errors'];
                        }
                    ?>
                    <?php 
                        // Find email and password
                        $sql = 'SELECT * FROM user WHERE email="' . $_SESSION['email'] . '"AND password="' . $_SESSION['password'] . '" LIMIT 1;';
                        // echo $sql;

                        // Execute command "Find Email"
                        $user = mysqli_query($connection->__construct(), $sql);
                        // echo "Password: " . $_SESSION['password'] . "<br>";
                        // Check at least there's one row AKA user exists
                        if (mysqli_num_rows($user) > 0){

                            // lop through emails and passwords
                            while($row = mysqli_fetch_array($user)){
                                // echo "Username: " . $row['username'] . "<br>";
                                // echo "password: " . $_SESSION['plainPWD'] . "<br>";
                                echo "
                                <h2 class='text-muted'>Update Profile</h2>
                                <form method='POST' action='../controllers/updateProfileController.php' class='mt-4' id='signup'>
                                    <input type='text' class='form-control' name='username' id='username' placeholder='Enter username' value='" . $row['username'] . "' required>
                                    <input type='text' class='form-control mt-3' name='firstname' id='firstname' placeholder='Enter firstname' value='" . $row['firstname'] . "' required>
                                    <input type='text' class='form-control mt-3' name='lastname' id='lastname' placeholder='Enter lastname' value='" . $row['lastname'] . "' required>
                                    <input type='email' class='form-control mt-3' name='email' id='email' placeholder='Enter email' value='" . $row['email'] . "' required>
                                    <input type='password' class='form-control mt-3' name='password' id='password' placeholder='Password' value='" . $_SESSION['plainPWD'] . "' required>
                                    <input type='text' class='form-control mt-3' name='photo' id='photo' placeholder='Enter picture url' value='" . $row['photo'] . "' required>
                                    <button type='submit' class='btn bg-primary mt-3 btn-outline-primary text-white w-100'>Update Profile</button>
                                </form>
                                ";
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>