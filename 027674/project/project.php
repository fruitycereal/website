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


$project_sql = "SELECT * FROM projects"; 
$project_result = mysqli_query($conn, $project_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Projects</title>
    <link rel="stylesheet" href="project.css">
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
        <a href="homepage.php" class="go-back-button">Back to Homepage</a>
        <h3>Your Projects:</h3>
        <?php if (mysqli_num_rows($project_result) > 0) { ?>
            <ul>
                <?php while ($project = mysqli_fetch_assoc($project_result)) { ?>
                    <li>
                        <strong><a href="view_project.php?project_id=<?php echo $project['project_id']; ?>"><?php echo htmlspecialchars($project['project_name']); ?></a></strong><br>
                        <br>
                        <small>Due Date: <?php echo htmlspecialchars($project['due_date']); ?></small>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No projects found.</p>
        <?php } ?>
    </div>
</body>
</html>
