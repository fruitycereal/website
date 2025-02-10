<?php
session_start();
include('connect1.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role']; 


$notification_sql = "SELECT * FROM notifications WHERE user_id = '$user_id' ORDER BY created_at DESC";
$notification_result = mysqli_query($conn, $notification_sql);


if (!$notification_result) {
    die('Error fetching notifications: ' . mysqli_error($conn));
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mark_as_read'])) {
    $notification_id = $_POST['notification_id'];
    $update_sql = "UPDATE notifications SET read_status = 'read' WHERE notification_id = '$notification_id' AND user_id = '$user_id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: notifications.php"); 
        exit();
    } else {
        echo "Error marking notification as read: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <link rel="stylesheet" href="notifs.css">
</head>
<body>
    <div class="header">
        <h2>Notifications</h2>
        <a href="homepage.php" class="top-right-button">Back to Homepage</a>
    </div>

    <div class="main-content">
        <?php if (mysqli_num_rows($notification_result) > 0): ?>
            <ul>
                <?php while ($notification = mysqli_fetch_assoc($notification_result)): ?>
                    <li class="<?php echo $notification['read_status'] == 'read' ? 'read' : 'unread'; ?>">
                        <p><?php echo htmlspecialchars($notification['message']); ?></p>
                        
                        <form method="POST" action="notifications.php">
                            <input type="hidden" name="notification_id" value="<?php echo $notification['notification_id']; ?>">

                            <button type="submit" name="mark_as_read" <?php echo $notification['read_status'] == 'read' ? 'disabled' : ''; ?>>Mark as Read</button>
                        </form>

                        <p><strong>Created at:</strong> <?php echo htmlspecialchars($notification['created_at']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No notifications available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
