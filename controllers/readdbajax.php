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

    // Define Connection
    $connection = new Connection();

    $task->id = $_GET['checkID'];

    // Show data
    $show = "SELECT * FROM task WHERE id='$task->id';";
    echo "Show: " . $show;
    $res = mysqli_query($connection->__construct(), $show);
    while ($row = mysqli_fetch_array($res)){
        echo $row['done'];
        echo "
        <div class='col-md-6 mt-3 mt-4'>
            <div class='col-md-12 tsk'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th class='col'><a href='#' class='btn btn-outline-primary'>Edit</a></th>
                            <th class='col'><a href='#' class='btn btn-outline-danger'>Delete</a></th>
                            <th class='col'><a href='#' class='btn btn-outline-success disabled'>Done</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='col text-muted  text-capitalize'>" . $row['taskText'] . "</td>
                            <td class='col'><i class='fa fa-check'></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        ";
    
        # header("location: ../views/tasks.php?taskID=" . $task->id);
    }
        
    // close connection
    $connection->__construct()->close();

?>