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

    // Get data got from user
    $usr->email = $_POST["email"];
    $usr->password = hash("sha512", $_POST["password"]);

    // Define Connection
    $connection = new Connection();

    // Find email 
    $sql = "SELECT * FROM user WHERE email='$usr->email' AND password='$usr->password';";
    // echo $sql;

    // Execute command "Find Email"
    $user = mysqli_query($connection->__construct(), $sql);

    // Check at least there's one row AKA user exists
    if (mysqli_num_rows($user) > 0){
        // echo "<br>in if <br>";
        while($row = mysqli_fetch_array($user)){
            // check id data eists
            if ($row['email'] == $usr->email && $row['password'] == $usr->password){
                // Set super global variables AkA session
                $_SESSION['username'] = $row['username'];
                $_SESSION['user-image'] = $row['photo'];
                $_SESSION["userID"] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['plainPWD'] =  $_POST["password"];
                // $_SESSION['user_id'] = $row['user_id'];
                // $_SESSION['UID'] = $row['user_id'];
                // echo "Data true logging <br>";
                // echo $_SESSION['username'] . "<br>";
                // echo $_SESSION['user-image'] . "<br>";

                // Redirect to posts page
                // header("Location: posts.php?UID=" . $_SESSION['UID']);
                header("location: ../views/todolist.php");
            }
        }
    }else{
        // Set error when login data does not exists
        $error = "<div class='alert alert-danger' role='alert'>
                    <strong>Error!</strong> 
                    <a class='alert-link'>incorrect email and password</a> Try submitting again.
                </div>";
                
        $_SESSION['signin_errors'] = $error;
        // echo "not login";

        // Redirect to home page
        header("Location: ../views/signin.php");
    }

    // close connection
    $connection->__construct()->close();

?>