<?php
session_start();
include('connect1.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];


$member_sql = "SELECT * FROM users"; 
$member_result = mysqli_query($conn, $member_sql);


if (!$member_result) {
    die('Error fetching members: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="homepage.css">
    <script>
        function redirectToDeadlines() {
            window.location.href = 'deadline.php';
        }
        function redirectToCreateProject() {
            window.location.href = 'create_project.php';
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="user-info">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Your Role: <?php echo ucfirst($role); ?></p>
        </div>
        <a href="logout.php" class="top-right-button">Log Out</a>
    </div>

    <div class="main-content">
        <div class="circle-container <?php echo ($role == 'admin') ? 'admin-layout' : 'member-layout'; ?>">
            <div class="circle" id="members">
                <a href="members.php"><span>Members</span></a>
            </div>
            <div class="circle" id="projects">
                <a href="project.php"><span>Projects</span></a>
            </div>
            
            <?php if ($role != 'admin') { ?>
                <div class="circle" id="deadlines" onclick="redirectToDeadlines()">
                    <span>Deadlines</span>
                </div>
            <?php } ?>

            <?php if ($role == 'admin') { ?>
                <div class="circle" id="create" onclick="redirectToCreateProject()">
                    <span>Create</span>
                </div>
                <div class="circle" id="students">
                    <a href="students.php"><span>Students</span></a>
                </div>
            <?php } ?>

            <div class="circle" id="notifications" style="position: relative;">
                <a href="notifications.php">
                    <span>Notifications</span>
                    <?php

                    $unread_sql = "SELECT * FROM notifications WHERE user_id = '$user_id' AND read_status = 'unread'";
                    $unread_result = mysqli_query($conn, $unread_sql);
                    if (mysqli_num_rows($unread_result) > 0) {
                        echo '<span class="notification-dot"></span>';
                    }
                    ?>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
