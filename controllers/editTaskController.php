<?php
    session_start();

    // Import Connection file
    require_once('../config/Connection.php');

    // Import User file
    require_once('../classes/Task.php');

    // Create object User class
    $task = new Task();

    // Import prevent File
    // require_once('preventAccess.php');

    // Set data got from user
    $task->taskText = $_POST["task"];
    $task->done = $_POST['status'] == 'yes' ? $task->done = 1 : $task->done = 0;
    $task->todolist_id = $_GET["editTaskID"];
    $Tid = $_GET['TID'];

    // Define Connection
    $connection = new Connection();
    
    // Get data and make it safe from injection
    $safeTaskText = mysqli_real_escape_string($connection->__construct(), $task->taskText);

    // Query
    $sql = "UPDATE task SET taskText='$safeTaskText', done='$task->done', todolist_id='$Tid' WHERE id='$task->todolist_id';";
    echo $sql  . "<br>";
  
    // Debugging
    // echo "Task text : " . $task->taskText  . "<br>";
    // echo "Task id : " . $task->todolist_id  . "<br>";

    // echo "not inserted";

    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die($connection->__construct());
    // echo "data inserted !";

    // redirect to todolist page
    header("location: ../views/todolist.php");
        
    // close connection
    $connection->__construct()->close();

?>