<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

$username = $_SESSION['username'];
$sql = "SELECT id FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user_id = $result->fetch_assoc()['id'];

$tasks = [];
$statuses = ['To Do', 'In Progress', 'Done'];

foreach ($statuses as $status) {
    $sql = "SELECT * FROM tasks WHERE user_id='$user_id' AND status='$status'";
    $result = $conn->query($sql);
    $tasks[$status] = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[$status][] = $row;
        }
    }
}

$sql = "SELECT * FROM user_activities WHERE user_id='$user_id' ORDER BY activity_date DESC";
$result = $conn->query($sql);
$activities = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
}

function calculate_progress($start_date, $deadline)
{
    $now = time();
    $start = strtotime($start_date);
    $end = strtotime($deadline);
    if ($now < $start) {
        return 0;
    } elseif ($now > $end) {
        return 100;
    } else {
        return round((($now - $start) / ($end - $start)) * 100);
    }
}
function get_progress_color($progress)
{
    if ($progress <= 20) {
        return '#ffcccc';
    } elseif ($progress <= 40) {
        return '#ffcc99';
    } elseif ($progress <= 60) {
        return '#ffff99';
    } elseif ($progress <= 80) {
        return '#ccff99';
    } else {
        return '#99ff99';
    }
}
include '../views/dashboard_view.php';
