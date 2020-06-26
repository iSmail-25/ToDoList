<?php 
    $todolistID = $_GET['editID'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todolist | Edit Todolist</title>
        <link rel="stylesheet" href="../css/newtodolist.css">
        <link rel="shortcut icon" href="../img/logo.jpg"  type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-4">
            <h2 class="text-muted">Edit todolist</h2>
            <form method="POST" action="<?php echo '../controllers/editTodolistController.php?todolistID=' . $todolistID . '' ?>" class="mt-4">
                <div class="form-group">
                    <label for="todolist-name">Todolist Name</label>
                    <input type="text" class="form-control" name="todolist-name" id="todolist-name" placeholder="Enter todolist name" required>
                </div>

                <div class="form-group">
                    <label for="color">Todolist Color</label>
                    <input type="color" class="form-control border-0" name="color" id="color" required>
                </div>

                <button type="submit" class="btn btn-outline-success w-100">Submit</button>
            </form>
        </div>
    </body>
</html>