<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="../assets/css/add_task.css">
</head>

<body>
    <div class="container">
        <h2>Add New Task</h2>
        <img src="../assets/images/add-task.png" alt="padlock" width="80px" height="80px" style="padding-bottom: 20px;">
        <form class="form-task" method="post" action="">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="status" required>
                <option value="To Do">To Do</option>
                <option value="In Progress">In Progress</option>
                <option value="Done">Done</option>
            </select>
            <select name="priority" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
            <input type="date" name="start_date" required>
            <input type="date" name="deadline" required>
            <button type="submit">Add Task</button>
        </form>
        <a href="../controllers/dashboard.php">Back to Dashboard</a>
    </div>
</body>

</html>