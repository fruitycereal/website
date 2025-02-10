<?php
session_start();
include('connect1.php');

if ($_SESSION['role'] != 'admin') {
    header("Location: homepage.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : null;
    $created_by = $_SESSION['user_id']; 
    $due_date = isset($_POST['due_date']) ? mysqli_real_escape_string($conn, $_POST['due_date']) : null; 


    $admin_query = "SELECT username FROM users WHERE user_id = '$created_by'";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_data = mysqli_fetch_assoc($admin_result);
    $admin_name = $admin_data['username']; 


    $sql = "INSERT INTO projects (project_name, description, created_by, due_date) 
            VALUES ('$project_name', " . ($description ? "'$description'" : "NULL") . ", '$created_by', " . ($due_date ? "'$due_date'" : "NULL") . ")";
    
    if (mysqli_query($conn, $sql)) {
        echo "Project created successfully.";

       
        $user_sql = "SELECT user_id FROM users WHERE user_id != '$created_by'";
        $user_result = mysqli_query($conn, $user_sql);

        if ($user_result) {
  
            while ($user = mysqli_fetch_assoc($user_result)) {
                $user_id = $user['user_id'];
                $message = "$admin_name has created a new project: $project_name"; 


                $notif_sql = "INSERT INTO notifications (user_id, message, created_at) 
                              VALUES ('$user_id', '$message', NOW())";
                mysqli_query($conn, $notif_sql);
            }
        } else {
            echo "Error fetching users: " . mysqli_error($conn);
        }

        header("Location: homepage.php"); 
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
    <title>Create Project</title>
    <link rel="stylesheet" href="create_project.css">
</head>
<body>
    <div class="header">
        <h2>Create New Project</h2>
        <a href="homepage.php" class="top-right-button">Back to Homepage</a>
    </div>

    <form method="POST" action="create_project.php" class="project-form">
        <label for="project_name">Project Name:</label>
        <input type="text" id="project_name" name="project_name" required><br><br>

        <label for="description">Description (optional):</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="due_date">Due Date (optional):</label>
        <input type="date" id="due_date" name="due_date"><br><br> 

        <button type="submit">Create Project</button>
    </form>
</body>
</html>
