<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

// get uid
$username = $_SESSION['username'];
$sql = "SELECT id FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user_id = $result->fetch_assoc()['id'];

$task_id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id='$task_id' AND user_id='$user_id'";
$result = $conn->query($sql);
$task = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $start_time = $_POST['start_date'];
    $deadline = $_POST['deadline'];

    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status', priority='$priority', start_date='$start_date', deadline='$deadline' WHERE id='$task_id' AND user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        $activity_sql = "INSERT INTO user_activities (user_id, activity) VALUES ('$user_id', 'Updated task: $title')";
        $conn->query($activity_sql);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
include '../views/edit_task_view.php';
