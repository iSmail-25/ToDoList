<?php 
    session_start();
    $id = $_GET['taskID'];

    // Import Connection file
    require_once('../config/Connection.php');

    // Define Connection
    $connection = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/todolist.css">
        <link rel="stylesheet" href="../css/todolistMedia.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <title>New Tasks</title>
        <link rel="stylesheet" href="../css/task.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="tabs">
            <div class="tabs-container">
            <a class="tab" href="todolist.php">Todolists</a>
            <a class="tab" href="tasks.php?taskID=<?php echo $id ?>">tasks</a>
            <a class="tab" href="newTask.php?taskID=<?php echo $id ?>">New Task</a>
            <a class="tab" href="profile.php"><img class="user-image" src="<?php echo $_SESSION['user-image'] ?>" alt="Image"> <span class="username text-capitalize"><?php echo $_SESSION['username'] ?></span></a>
            <a class="tab" href="../controllers/logoutController.php">Logout</a>
            <!-- <span class="et-hero-tab-slider"></span> -->
            </div>
        </nav>

        <div class="container">
            <div class="row" id="tasks">
                <?php 
                // Find 
                $sql = "SELECT * FROM  task WHERE todolist_id='$id';";
                // echo $sql;

                // Execute command "Find Email"
                $task = mysqli_query($connection->__construct(), $sql);
                // echo "ID: " . $id . " ==? " . " Userid:  " . $_SESSION["userID"] . "<br>";
                // Check at least there's one row AKA task exists
                if (mysqli_num_rows($task) > 0){

                    // loop through tasks
                    while($row = mysqli_fetch_array($task)){
                        if ($row['done'] == 1){
                            echo "
                            <div class='col-md-6 mt-3 mt-4'>
                                <div class='col-md-12 tsk'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th class='col'><a href=editTask.php?editTaskID=" . $row['id']. "&TID=" . $row['todolist_id'] . " class='btn btn-outline-primary'>Edit</a></th>
                                                <th class='col'><a href='../controllers/deleteTask.php?deleteTaskID=" . $row['id'] . "' .  class='btn btn-outline-danger'>Delete</a></th>
                                                <th class='col'><button class='btn btn-outline-success disabled'>Done</button></th>
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
                        }else{
                            echo "
                            <div class='col-md-6 mt-3 mt-4'>
                                <div class='col-md-12 tsk'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th class='col'><a href=editTask.php?editTaskID=" . $row['id']. "&TID=" . $row['todolist_id'] . " class='btn btn-outline-primary'>Edit</a></th>
                                                <th class='col'><a href='../controllers/deleteTask.php?deleteTaskID=" . $row['id'] . "' class='btn btn-outline-danger'>Delete</a></th>
                                                <th class='col'><button class='btn btn-outline-success' value=" . $row['id'] . " id='done'>Done</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class='col text-muted text-capitalize'>" . $row['taskText'] . "</td>
                                                <td class='col'><i class='fa fa-ban'></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        ";
                        }
                    }
                }
            ?>
            </div>
        </div>

        <!-- taskid -->
        <input type="hidden" id="hidden" value="<?php echo $id ?>">
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/checked.js"></script>
    </body>
</html>