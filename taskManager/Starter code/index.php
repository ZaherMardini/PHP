<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager App</title>
    <link rel="stylesheet" href="style.css?v1=b">
</head>
<body>
    <div class="main_task_container">
    <div class="container">
        <h2>Task Manager App</h2>

         <!-- Form to add a new task -->
         <form method="post" action="">
            <label for="task">Add Task:</label>
            <input type="text" id="task" name="task" required>
            <button type="submit" name="addTask">Add Task</button>
        </form>

          <!-- Form to select completed or incomplete tasks and Sorting and filtering -->
          <form method="post" action="">
            <!-- Label 1 -->
            <label for="completedFilter">Show:</label>
            <select id="completedFilter" name="completedFilter">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="incomplete">Incomplete</option>
            </select>

            <!-- Label 2 -->
            <label for="sortFilter">Sort:</label>
            <select id="sortFilter" name="sortFilter">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>

            <button type="submit">Filter and Sort</button>
        </form>
        
          <!-- Form to mark a task as completed -->
          <form method="post" action="">
            <label for="completedTaskIndex">Complete Task (Enter Task Index):</label>
            <input type="number" id="completedTaskIndex" name="completedTaskIndex" required>
            <button type="submit" name="completeTask">Complete</button>
        </form>

          <!-- Form to remove an incomplete task -->
          <form method="post" action="">
            <label for="removeTaskIndex">Remove Task (Enter Task Index):</label>
            <input type="number" id="removeTaskIndex" name="removeTaskIndex" required>
            <button type="submit" name="removeTask">Remove</button>
        </form>

           <!-- Form to clear all tasks -->
           <form method="post" action="">
            <button type="submit" class="clear" name="clearAllTasks">Clear All Tasks</button>
        </form>
    </div>
    </div>
</body>
</html>