<?php
    session_start();

    // Import Connection file
    require_once('../config/Connection.php');

    // Import User file
    require_once('../classes/TodoList.php');

    // Create object User class
    $todolist = new TodoList();

    // Import prevent File
    // require_once('preventAccess.php');

    // Set data got from user
    $todolist->name = $_POST["todolist-name"];
    $todolist->color = $_POST["color"];
    $todolist->user_id = $_SESSION["userID"];
    $todolist->id = $_GET['todolistID'];

    // Define Connection
    $connection = new Connection();
    
    // Get data and make it safe from injection
    $safeName = mysqli_real_escape_string($connection->__construct(), $todolist->name);

    // echo 'Email Address seems new !';
    // $sql = "INSERT INTO todolist (name, color, user_id) VALUES ('$todolist->name', '$todolist->color', '$todolist->user_id')";

    // Update Query 
    $sql = "UPDATE todolist SET name='$todolist->name', color='$todolist->color', user_id='$todolist->user_id' WHERE id=$todolist->id;";
    // echo $sql . "<br>";
    
    // Debugging
    // echo "Update Todolist name : " .$todolist->name  . "<br>";
    // echo "Update Todolist color : " .$todolist->color  . "<br>";
    // echo "Update Todolist user_id : " .$todolist->user_id  . "<br>";
    // echo "Update Todolist todolistID : " .$todolist->id  . "<br>";

    // execute query aka update data
    mysqli_query($connection->__construct(), $sql);

    // echo "Data Inserted !";
    // redirect to todolist page
    header("location: ../views/todolist.php");
        
    // close connection
    $connection->__construct()->close();

?>