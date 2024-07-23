<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboad.css">
</head>

<body>
    <div class="header">
        <h2>Welcome <?php echo $_SESSION['username']; ?>👋</h2>
        <div>
            <a href="../controllers/logout.php">
                <img class="icon-logout" src="../assets/images/logout.png" alt="icon-logout">
            </a>
        </div>
    </div>
    <div class="content" id="home">
        <div class="container">
            <div class="main-content">
                <div class="main-container">
                    <img src="../assets/images/cwc.png" alt="calendar-with-clock" class="cwc-img">
                    <div class="text-container">
                        <h1 class="main-heading">Welcome to Daily Management Task!</h1>
                        <p class="main-text">Start your day by planning and completing your tasks. Always remember, every small step brings you closer to your big goals!</p>
                        <p class="main-quote">"Success is the sum of small efforts, repeated day in and day out." - Robert Collier</p>
                    </div>
                </div>
                <div class="board">
                    <div class="list-task">
                        <h2 class="status-task">Task Ready</h2>
                        <div class="column">
                            <?php foreach ($tasks['To Do'] as $task) : ?>
                                <div class="task-card">
                                    <p class="title-task"> <?php echo $task['title']; ?></p>
                                    <p><?php echo $task['description']; ?></p>
                                    <div class="card-footer">
                                        <div class="deadline-footer">
                                            <img src="../assets/images/deadline.png" alt="icon-deadline" class="icon-deadline">
                                            <p><?php echo $task['deadline']; ?></p>
                                        </div>

                                        <a href="../controllers/edit_task.php?id=<?php echo $task['id']; ?>">
                                            <img src="../assets/images/edit.png" alt="icon-edit" class="icon-edit">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="list-task">
                        <h2 class="status-task">In Progress</h2>
                        <div class="column">
                            <?php foreach ($tasks['In Progress'] as $task) : ?>
                                <div class="task-card">
                                    <p class="title-task"> <?php echo $task['title']; ?></p>
                                    <p><?php echo $task['description']; ?></p>
                                    <div class="card-footer">
                                        <div class="deadline-footer">
                                            <img src="../assets/images/deadline.png" alt="icon-deadline" class="icon-deadline">
                                            <p><?php echo $task['deadline']; ?></p>
                                        </div>
                                        <a href="../controllers/edit_task.php?id=<?php echo $task['id']; ?>">
                                            <img src="../assets/images/edit.png" alt="icon-edit" class="icon-edit">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="list-task">
                        <h2 class="status-task">Done</h2>
                        <div class="column">
                            <?php foreach ($tasks['Done'] as $task) : ?>
                                <div class="task-card">
                                    <p class="title-task"> <?php echo $task['title']; ?></p>
                                    <p><?php echo $task['description']; ?></p>
                                    <div class="card-footer">
                                        <div class="deadline-footer">
                                            <img src="../assets/images/deadline.png" alt="icon-deadline" class="icon-deadline">
                                            <p><?php echo $task['deadline']; ?></p>
                                        </div>
                                        <a href="../controllers/edit_task.php?id=<?php echo $task['id']; ?>">
                                            <img src="../assets/images/edit.png" alt="icon-edit" class="icon-edit">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="side-content">
                <h2>Add New Task</h2>
                <div class="new-task-container">
                    <div class="add-task">
                        <a href="../controllers/add_task.php">
                            <img src="../assets/images/add.png" alt="icon-add" class="icon-add">
                        </a>
                    </div>
                </div>
                <h2>Task Progress</h2>
                <div class="progress-container">
                    <?php foreach ($tasks['In Progress'] as $task) : ?>
                        <p><?php echo $task['title']; ?></p>
                        <div class="progress-bar">
                            <div class="progress" style="width: <?php echo $progress = calculate_progress($task['start_date'], $task['deadline']); ?>%; background-color: <?php echo get_progress_color($progress); ?>;"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <h2>Recent Activity</h2>
                <div class="activities-container">
                    <div class="activities">
                        <?php if (empty($activities)) : ?>
                            <p>No recent activities.</p>
                        <?php else : ?>
                            <?php foreach ($activities as $activity) : ?>
                                <div class="activity">
                                    <p><?php echo $_SESSION['username']; ?> <span><?php echo $activity['activity']; ?></span></p>
                                    <small><?php echo $activity['activity_date']; ?></small>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Source: Icon8 & Freepik</p>
        <p>&copy; Abdul Rosyid 2024</p>
    </div>
</body>

</html>