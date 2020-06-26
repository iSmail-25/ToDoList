<?php 
    $id = $_GET['editTaskID'];
    $Tid = $_GET['TID'];
    // echo $Tid;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/newTask.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <title>Update Tasks</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2 class="text-muted">Create new task</h2>
            <form method="POST" action="../controllers/editTaskController.php?editTaskID=<?php echo $id ?>&TID=<?php echo $Tid  ?>" class="mt-4" id="signin">
                <div class="form-group">
                    <label for="signin-email">Have you finished your task ?</label>
                    <input type="text" class="form-control text-lowercase" name="status" id="signin-email" aria-describedby="emailHelp" placeholder="Yes or no" required>
                </div>  

              <div class="form-group">
                    <label for="signin-email">Task Text</label>
                    <input type="text" class="form-control" name="task" id="signin-email" aria-describedby="emailHelp" placeholder="Enter task text" required>
                </div>  

                <button type="submit" class="text-white bg-primary btn-outline-primary  btn w-100">Create task</button>
            </form>
        </div>
    </body>
</html>