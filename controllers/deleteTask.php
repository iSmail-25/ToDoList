<?php
    session_start();

    // Import Connection file
    require_once('../config/Connection.php');

    // Define Connection
    $connection = new Connection();

    $id = $_GET['deleteTaskID'];
        
    // Delete Query
    $sql = "DELETE FROM task WHERE id='" . $id . "';";

    // echo $sql;

    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die($connection->__construct());

    // // close connection
    $connection->__construct()->close();

    // redirect to todolist page
    header("location: ../views/todolist.php");
?>