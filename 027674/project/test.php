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


$turn_in_sql = "SELECT u.username, p.project_name, t.status, p.due_date 
                FROM users u
                LEFT JOIN turn_ins t ON u.user_id = t.user_id
                LEFT JOIN projects p ON t.project_id = p.project_id
                WHERE u.role = 'member'
                ORDER BY u.username, p.project_name";  
$turn_in_result = mysqli_query($conn, $turn_in_sql);


if (!$project_result || !$turn_in_result) {
    die('Error fetching data: ' . mysqli_error($conn));
}

$projects = [];
while ($project = mysqli_fetch_assoc($project_result)) {
    $projects[$project['project_id']] = $project['project_name'];
}


$students = [];
while ($row = mysqli_fetch_assoc($turn_in_result)) {
    $students[$row['username']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students Overview</title>
    <link rel="stylesheet" href="students.css">
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

        <h3>Students Overview</h3>
        
   
        <div class="project-row">
            <div class="project-block">Username</div>
            <?php foreach ($projects as $project_id => $project_name) : ?>
                <div class="project-block"><?php echo $project_name; ?></div>
            <?php endforeach; ?>
        </div>


        <div class="students-row">
            <?php foreach ($students as $username => $projects_status) : ?>
                <div class="student-column">
                    <div class="username"><?php echo htmlspecialchars($username); ?></div>
                    <?php
                    foreach ($projects as $project_id => $project_name) : 
                        $status = 'Not Turned In';  
                        $status_found = false;  

                        foreach ($projects_status as $status_row) {
                            if ($status_row['project_name'] == $project_name) {
            
                                if ($status_row['status'] == 'On Time') {
                                    $status = 'Turned In';
                                } elseif ($status_row['status'] == 'Late') {
                                    $status = 'Turned In Late';
                                } else {
                                    $status = 'Not Turned In';
                                }
                                $status_found = true;
                                break;
                            }
                        }

    
                        if (!$status_found) {
                            $due_date_sql = "SELECT due_date FROM projects WHERE project_id = '$project_id'";
                            $due_date_result = mysqli_query($conn, $due_date_sql);
                            $due_date_row = mysqli_fetch_assoc($due_date_result);
                            $due_date = $due_date_row['due_date'];

          
                            $current_date = date('Y-m-d');  
                            if ($current_date > $due_date) {
                                $status = 'Missing';
                            }
                        }
                    ?>
                        <div class="status <?php echo strtolower(str_replace(' ', '-', $status)); ?>"><?php echo $status; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
