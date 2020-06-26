<?php
    session_start();

    // userID session variable
    $_SESSION["userID"] = null;

    // Import Connection file
    require_once('../config/Connection.php');

    // Import User file
    require_once('../classes/User.php');

    // Create object User class
    $usr = new User();

    // Import prevent File
    // require_once('preventAccess.php');

    // Set data got from user
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

        // Check if email is not alreafy exists
        if ($connection->checkEmailExistence($safeEmail)){         
            // echo 'Email Address is Already In Use.';
            // Set error when login data does not exists
            $error = "<div class='alert alert-secondary' role='alert'>
                        <strong>Error!</strong> 
                        <a class='alert-link'>Email already exists</a> Try again.
                    </div>";
                    
            $_SESSION['signup_errors'] = $error;

            // echo $_SESSION['signup_errors'];

            // Redirect to home page
            header("Location: ../views/signup.php");
            
        }else{
            // echo 'Email Address seems new !';
            $sql = "INSERT INTO user (username, password, email, firstname, lastname, photo) VALUES 
            ('$safeUsername', '$safePassword', '$safeEmail', '$safeFirstname', '$safeLastname', '$safePhoto')";
            
            $_SESSION['username'] = $safeUsername;
            $_SESSION['user-image'] = $safePhoto;

            // execute query aka insert data
            mysqli_query($connection->__construct(), $sql);

            // Find email and password
            $sql = "SELECT * FROM user WHERE email='$safeEmail' AND password='$safePassword' LIMIT 1;";

            // Execute command "Find Email"
            $user = mysqli_query($connection->__construct(), $sql);

            // Check at least there's one row AKA user exists
            if (mysqli_num_rows($user) > 0){
                // lop through emails and passwords
                while($row = mysqli_fetch_array($user)){
                    // check id data eists
                    if ($row['email'] == $safeEmail && $row['password'] == $safePassword){
                        // Set super global variables AkA session
                        // $_SESSION['UID'] = $row['user_id'];
                        $_SESSION["userID"] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['plainPWD'] =  $_POST["password"];

                        // Redirect to posts page
                        // header("Location: posts.php?UID=" . $_SESSION['UID']);
                        
                        // redirect to todolist page
                        header("location: ../views/todolist.php");
                    }
                }
            }

            // echo "Data Inserted !";

        }
            
        // close connection
        $connection->__construct()->close();
    }

?>