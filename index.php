<?php 
    include 'includes/class-autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="tasks">
  <!-- title -->
  <h1>My To-Do List</h1>
    <form method="POST" action="SubmitTask.php">
		<input type="text" name="task" class="task_input" required>
        <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
    </form>

    <table>
        <br>
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Tasks</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $taskobject = new DBCHandler();
            $taskobject->getTasks();
        ?>
    </tbody>
    </table>
  <!-- load tasks -->

</div>
</body>
</html>
