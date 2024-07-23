<?php
session_start();
include '../config.php';

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // get data
    $sql = "SELECT * FROM users WHERE username='$username_or_email' OR email='$username_or_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username atau email tidak ditemukan.";
    }
}
include '../views/login_view.php';
