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


$sql = "SELECT * FROM users";  
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error fetching users: ' . mysqli_error($conn));
}

$admins = [];
$users = [];

while ($user = mysqli_fetch_assoc($result)) {
    if ($user['role'] == 'admin') {
        $admins[] = $user;
    } else {
        $users[] = $user;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Members</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>

    <div class="header">
        <div class="user-info">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Your Role: <?php echo ucfirst($role); ?></p>
        </div>
        <a href="logout.php" class="top-right-button">Log Out</a>
    </div>

    <div class="members-container">
        <div class="members-header">
            <h2>Members</h2>
            <a href="homepage.php" class="top-button">Go Back</a>
        </div>


        <div class="role-section">
            <div class="role-title">Admins</div>
            <div class="member-list">
                <?php foreach ($admins as $admin) { ?>
                    <div class="member-item">
                        <strong><?php echo htmlspecialchars($admin['username']); ?></strong>
                        <p>Role: <?php echo ucfirst($admin['role']); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="role-section">
            <div class="role-title">Users</div>
            <div class="member-list">
                <?php foreach ($users as $user) { ?>
                    <div class="member-item">
                        <strong><?php echo htmlspecialchars($user['username']); ?></strong>
                        <p>Role: <?php echo ucfirst($user['role']); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
