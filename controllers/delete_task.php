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

$sql = "DELETE FROM tasks WHERE id='$task_id' AND user_id='$user_id'";
if ($conn->query($sql) === TRUE) {
    $activity_sql = "INSERT INTO user_activities (user_id, activity) VALUES ('$user_id', 'Deleted a task')";
    $conn->query($activity_sql);
    header("Location: dashboard.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
