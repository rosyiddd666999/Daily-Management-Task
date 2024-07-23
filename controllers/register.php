<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak sesuai.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // input data
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
include '../views/register_view.php';
