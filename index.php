<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: controllers/login.php");
    exit;
} else {
    header("Location: controllers/dashboard.php");
    exit;
}
