<?php
session_start();
include('connect1.php');

if ($_SESSION['role'] != 'admin') {
    header("Location: homepage.php");
    exit();
}

$project_id = $_GET['project_id']; 
$project_sql = "SELECT * FROM projects WHERE project_id = '$project_id'";
$project_result = mysqli_query($conn, $project_sql);
$project = mysqli_fetch_assoc($project_result);

if (!$project) {
    echo "Project not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : null;
    $due_date = isset($_POST['due_date']) ? mysqli_real_escape_string($conn, $_POST['due_date']) : null;

    $update_sql = "UPDATE projects SET project_name = '$project_name', description = " . ($description ? "'$description'" : "NULL") . ", due_date = " . ($due_date ? "'$due_date'" : "NULL") . " WHERE project_id = '$project_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "Project updated successfully.";
        header("Location: view_project.php?project_id=$project_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
    <link rel="stylesheet" href="create_project.css">
</head>
<body>
    <div class="header">
        <h2>Edit Project</h2>
        <a href="project.php" class="top-right-button">Back to Projects</a>
    </div>

    <form method="POST" action="edit.php?project_id=<?php echo $project_id; ?>" class="project-form">
        <label for="project_name">Project Name:</label>
        <input type="text" id="project_name" name="project_name" value="<?php echo htmlspecialchars($project['project_name']); ?>" required><br><br>

        <label for="description">Description (optional):</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($project['description']); ?></textarea><br><br>

        <label for="due_date">Due Date (optional):</label>
        <input type="date" id="due_date" name="due_date" value="<?php echo htmlspecialchars($project['due_date']); ?>"><br><br>

        <button type="submit">Update Project</button>
    </form>
</body>
</html>
