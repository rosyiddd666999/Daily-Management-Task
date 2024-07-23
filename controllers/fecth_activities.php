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

$sql = "SELECT * FROM user_activities WHERE user_id='$user_id' ORDER BY activity_date DESC";
$result = $conn->query($sql);

$activities = [];
while ($row = $result->fetch_assoc()) {
    $activities[] = $row;
}

echo json_encode($activities);
