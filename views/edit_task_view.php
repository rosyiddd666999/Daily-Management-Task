<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Detail</title>
    <link rel="stylesheet" href="../assets/css/add_task.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <h2>Task Detail</h2>
        <img src="../assets/images/rescheduling.png" alt="padlock" width="80px" height="80px" style="padding-bottom: 20px;">
        <form class="form-task" method="post" action="">
            <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
            <textarea name="description" placeholder="Description" required><?php echo $task['description']; ?></textarea>
            <select name="status" required>
                <option value="To Do" <?php if ($task['status'] == 'To Do') echo 'selected'; ?>>To Do</option>
                <option value="In Progress" <?php if ($task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
                <option value="Done" <?php if ($task['status'] == 'Done') echo 'selected'; ?>>Done</option>
            </select>
            <select name="priority" required>
                <option value="Low" <?php if ($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
                <option value="Medium" <?php if ($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
                <option value="High" <?php if ($task['priority'] == 'High') echo 'selected'; ?>>High</option>
            </select>
            <input type="date" name="start_date" value="<?php echo $task['start_date']; ?>" required>
            <input type="date" name="deadline" value="<?php echo $task['deadline']; ?>" required>
            <div class="b-bottom">
                <button type="submit" name="update">Update Task</button>
                <div class="delete-container">
                    <a href="../controllers/delete_task.php?id=<?php echo $task_id; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this task?')">Delete Task</a>
                </div>
            </div>
        </form>
        <a href="../controllers/dashboard.php" class="back-button">Back to Dashboard</a>
    </div>
</body>

</html>