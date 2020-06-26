<?php 
    session_start();
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
        <title>TodoList</title>
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

        <!-- Reading Todolists -->
        <div class="container mt-4">
            <div class="row">
                <?php
                    $todolist = "SELECT * FROM todolist;";
                    $all_todolists = mysqli_query($connection->__construct(), $todolist);
                    while ($row = mysqli_fetch_array($all_todolists)) {
                        if ($row['user_id'] == $_SESSION["userID"] ){
                            echo "
                            <div class='col-md-6 mt-3'>
                                <div class='col-md-12 p-4 text-center' style='background-color: " . $row['color'] . ";'>
                                    <div class='dropdown' id='drop'>
                                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        ...</button>
                                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                        <a class='dropdown-item' href='edittodolist.php?editID=" . $row['id'] . "'>Edit</a>
                                        <a class='dropdown-item' href='../controllers/deletetodolistController.php?deleteID=" . $row['id'] . "'>Delete</a>
                                    </div>
                                </div>
                                    <a href=tasks.php?taskID=" . $row['id'] . " class='text-decoration-none'>
                                        <h4 class='text-white text-capitalize'>" . $row['name'] . "</h4>
                                    </a>
                                </div>
                            </div>
                            ";
                        }else{
                            echo "";
                        }
                    }

                ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>