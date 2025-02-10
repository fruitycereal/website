<?php
session_start();
include('connect1.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$notification_id = $_GET['notification_id']; 
$user_id = $_SESSION['user_id']; 

$sql = "UPDATE notifications SET read_status = 1 WHERE notification_id = $notification_id AND user_id = $user_id";
if (mysqli_query($conn, $sql)) {
    header("Location: homepage.php"); 
    exit();
} else {
    echo "Error marking notification as read: " . mysqli_error($conn);
}
?>
