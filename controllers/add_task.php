<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

// Dapatkan user_id dari database
$username = $_SESSION['username'];
$sql = "SELECT id FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user_id = $result->fetch_assoc()['id'];

// Proses form untuk menambahkan tugas baru
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $start_time = $_POST['start_date'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO tasks (user_id, title, description, status, priority, start_date, deadline) VALUES ('$user_id', '$title', '$description', '$status', '$priority', '$start_date', '$deadline')";
    if ($conn->query($sql) === TRUE) {
        $activity_sql = "INSERT INTO user_activities (user_id, activity) VALUES ('$user_id', 'Created a new task: $title')";
        $conn->query($activity_sql);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
include '../views/add_task_view.php';
