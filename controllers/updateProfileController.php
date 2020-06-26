<?php
    session_start();

    // Import Connection file
    require_once('../config/Connection.php');

    // Import User file
    require_once('../classes/User.php');

    // Create object User class
    $usr = new User();

    // Import prevent File
    // require_once('preventAccess.php');

    // Set data got from user
    $usr->id = $_SESSION["userID"];
    $usr->username = $_POST["username"];
    $usr->firstname = $_POST["firstname"];
    $usr->lastname = $_POST["lastname"];
    $usr->email = $_POST["email"];
    $usr->photo = $_POST["photo"];
    $usr->password = hash("sha512", $_POST["password"]);
    

    // Check user data
    if (preg_match("/^([a-zA-Z]+)$/", $usr->username) && preg_match("/^([a-zA-Z]+)$/", $usr->firstname) &&
        preg_match("/^([a-zA-Z]+)$/", $usr->lastname) && $usr->photo != "" &&
        filter_var($usr->email, FILTER_VALIDATE_EMAIL) && ($usr->password != null || $usr->password != "")){

        // Define Connection
        $connection = new Connection();
        
        // Get data and make it safe from injection
        $safeUsername = mysqli_real_escape_string($connection->__construct(), $usr->username);
        $safeFirstname = mysqli_real_escape_string($connection->__construct(), $usr->firstname);
        $safeLastname = mysqli_real_escape_string($connection->__construct(), $usr->lastname);
        $safeEmail = mysqli_real_escape_string($connection->__construct(), $usr->email);
        $safePhoto = mysqli_real_escape_string($connection->__construct(), $usr->photo);
        $safePassword = mysqli_real_escape_string($connection->__construct(), $usr->password);

        // Update Query 
        $sql = "UPDATE user SET username='$safeUsername', password='$safePassword', email='$safeEmail', 
                                firstname='$safeFirstname', lastname='$safeLastname', photo='$safePhoto' WHERE id=$usr->id;";
        // echo $sql;

        // when query executed
        if (mysqli_query($connection->__construct(), $sql)){         
            // echo 'Email Address is Already In Use.';
            // Set error when login data does not exists

            // Set global session variables
            $_SESSION['update_errors'] = null;
            $_SESSION['username'] = $safeUsername;
            $_SESSION['user-image'] = $safePhoto;
            $_SESSION['email'] = $safeEmail;
            $_SESSION['password'] = $safePassword;
            $_SESSION['plainPWD'] =  $_POST["password"];

            // Redirect to home page
            header("Location: ../views/todolist.php");
            
        }else{
            // echo "Data did not Updated !";
            $error = "<div class='alert alert-secondary' role='alert'>
                        <strong>Error!</strong> 
                        <a class='alert-link'>Data did not updated</a> Try again.
                    </div>";
                    
            $_SESSION['update_errors'] = $error;


            // Redirect to home page
            header("Location: ../views/profile.php");

        }
            
        // close connection
        $connection->__construct()->close();
    }else{
            // echo "Data did not Updated !";
            $error = "<div class='alert alert-secondary' role='alert'>
                        <strong>Error!</strong> 
                        <a class='alert-link'>Data did not updated</a> Try again.
                    </div>";
                    
            $_SESSION['update_errors'] = $error;


            // Redirect to home page
            header("Location: ../views/profile.php");
    }

?>