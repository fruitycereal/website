<?php
session_start();
include('connect1.php');



if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role']; 
$project_id = $_GET['project_id']; 

$project_sql = "SELECT * FROM projects WHERE project_id = '$project_id'";
$project_result = mysqli_query($conn, $project_sql);
$project = mysqli_fetch_assoc($project_result);

if (!$project) {
    echo "Project not found.";
    exit();
}


$has_turned_in = false;
$status = "";
if ($role == 'member') {
    $turn_in_sql = "SELECT * FROM turn_ins WHERE project_id = '$project_id' AND user_id = '$user_id'";
    $turn_in_result = mysqli_query($conn, $turn_in_sql);
    if (mysqli_num_rows($turn_in_result) > 0) {
        $has_turned_in = true;
        $turn_in_data = mysqli_fetch_assoc($turn_in_result);
        $status = $turn_in_data['status'];
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['turn_in']) && !$has_turned_in && $role == 'member') {
    $due_date_sql = "SELECT due_date FROM projects WHERE project_id = '$project_id'";
    $due_date_result = mysqli_query($conn, $due_date_sql);
    $due_date_row = mysqli_fetch_assoc($due_date_result);
    $due_date = $due_date_row['due_date'];


    $current_date = date('Y-m-d');
    $status = ($due_date && $current_date > $due_date) ? 'Late' : 'On Time';


    $turn_in_sql = "INSERT INTO turn_ins (project_id, user_id, status) VALUES ('$project_id', '$user_id', '$status')";
    if (mysqli_query($conn, $turn_in_sql)) {

        $message = "User " . $_SESSION['username'] . " has turned in the project: " . htmlspecialchars($project['project_name']);
        $notification_sql = "INSERT INTO notifications (user_id, message) SELECT user_id, '$message' FROM users WHERE role = 'admin'";
        mysqli_query($conn, $notification_sql);

        header("Location: view_project.php?project_id=$project_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// สวัสดีวันจันทร์ค่ะอาจารย์เตยสุดหล่อและใจดีมาก 888


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['unturn_in']) && $has_turned_in && $role == 'member') {
    $unturn_sql = "DELETE FROM turn_ins WHERE project_id = '$project_id' AND user_id = '$user_id'";
    if (mysqli_query($conn, $unturn_sql)) {

        $message = "User " . $_SESSION['username'] . " has undone their submission for the project: " . htmlspecialchars($project['project_name']);
        $notification_sql = "INSERT INTO notifications (user_id, message) SELECT user_id, '$message' FROM users WHERE role = 'admin'";
        mysqli_query($conn, $notification_sql);

        header("Location: view_project.php?project_id=$project_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_project']) && $role == 'admin') {
    $delete_turn_ins_sql = "DELETE FROM turn_ins WHERE project_id = '$project_id'";
    mysqli_query($conn, $delete_turn_ins_sql);

    $delete_project_sql = "DELETE FROM projects WHERE project_id = '$project_id'";
    if (mysqli_query($conn, $delete_project_sql)) {
        header("Location: project.php");
        exit();
    } else {
        echo "Error deleting project: " . mysqli_error($conn);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Project</title>
    <link rel="stylesheet" href="view.css">
    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this project? This action cannot be undone.");
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="user-info">
            <h2>Project: <?php echo htmlspecialchars($project['project_name']); ?></h2>
        </div>
        <a href="logout.php" class="top-right-button">Log Out</a>
    </div>

    <div class="main-content">
        <a href="project.php" class="go-back-button">Back to Projects</a>

        <h3>Description</h3>
        <p><?php echo $project['description'] ? nl2br(htmlspecialchars($project['description'])) : 'No description provided.'; ?></p>

        <p><strong>Due Date:</strong> <?php echo $project['due_date'] ? htmlspecialchars($project['due_date']) : 'No due date set.'; ?></p>

        <?php if ($role == 'member') { ?>
            <?php if (!$has_turned_in) { ?>
                <form method="POST" action="view_project.php?project_id=<?php echo $project_id; ?>">
                    <button type="submit" name="turn_in" class = "turn-in">Turn in Project</button>
                </form>
            <?php } else { ?>
                <p>You have already turned in this project</p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($status); ?></p>
                <form method="POST" action="view_project.php?project_id=<?php echo $project_id; ?>">
                    <button type="submit" name="unturn_in" class = "unturn-button">Unturn Project</button>
                </form>
            <?php } ?>
        <?php } else { ?>
            <p><strong>Admins cannot turn in projects</strong></p>
        <?php } ?>

        <?php if ($role == 'admin') { ?>
            <a href="edit.php?project_id=<?php echo $project_id; ?>" class="edit-button">Edit Project</a>
            <form method="POST" action="view_project.php?project_id=<?php echo $project_id; ?>" onsubmit="return confirmDeletion();">
                <button type="submit" name="delete_project" class="delete-button">Delete Project</button>
            </form>
        <?php } ?>
    </div>
</body>
</html>


