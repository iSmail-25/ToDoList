<?php 
    $id = $_GET['taskID'];
    // echo $id;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/newTask.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <title>New Tasks</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2 class="text-muted">Create new task</h2>
            <form method="POST" action="../controllers/newTaskController.php?taskID=<?php echo $id ?>" class="mt-4" id="signin">
                <div class="form-group">
                    <label for="signin-email">Task Text</label>
                    <input type="text" class="form-control" name="task" id="signin-email" aria-describedby="emailHelp" placeholder="Enter task text" required>
                </div>  

                <button type="submit" class="text-white bg-primary btn-outline-primary  btn w-100">Create task</button>
            </form>
        </div>
    </body>
</html>