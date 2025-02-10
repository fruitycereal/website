<?php
session_start();
include('connect1.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];


$user_sql = "SELECT username FROM users WHERE user_id = '$user_id'";
$user_result = mysqli_query($conn, $user_sql);
if ($user_result) {
    $user = mysqli_fetch_assoc($user_result);
    $username = $user['username'];  
} else {
    echo "Error fetching user data.";
    exit();
}

$upcoming_sql = "SELECT * FROM projects 
                 WHERE (due_date > CURDATE() OR due_date IS NULL)
                 AND project_id NOT IN (SELECT project_id FROM turn_ins WHERE user_id = '$user_id')";
$upcoming_result = mysqli_query($conn, $upcoming_sql);


$past_due_sql = "SELECT * FROM projects 
                 WHERE due_date < CURDATE() 
                 AND project_id NOT IN (SELECT project_id FROM turn_ins WHERE user_id = '$user_id')";
$past_due_result = mysqli_query($conn, $past_due_sql);


$completed_sql = "SELECT * FROM projects 
                  WHERE project_id IN (SELECT project_id FROM turn_ins WHERE user_id = '$user_id')";
$completed_result = mysqli_query($conn, $completed_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deadlines</title>
    <link rel="stylesheet" href="deadline.css">
    <script src="/js/scripts.js"></script> 
</head>
<body>


    <div class="header">
        <div class="user-info">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
            <p>Your Role: <?php echo ucfirst($role); ?></p>
        </div>
        <a href="homepage.php" class="top-right-button">Back to Homepage</a>
    </div>


    <div class="main-content">


        <div class="tabs">
            <div class="tab active" id="upcoming-tab">Upcoming</div>
            <div class="tab" id="past-due-tab">Past Due</div>
            <div class="tab" id="completed-tab">Completed</div>
        </div>

        <div class="project-container">

            <div class="upcoming">
                <h4>Upcoming Projects</h4>
                <ul>
                    <?php while ($project = mysqli_fetch_assoc($upcoming_result)) { ?>
                        <li>
                            <a href="view_project.php?project_id=<?php echo $project['project_id']; ?>">
                                <strong><?php echo htmlspecialchars($project['project_name']); ?></strong>
                            </a>
                            <p>Due Date: <?php echo htmlspecialchars($project['due_date']); ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>


            <div class="past-due">
                <h4>Past Due Projects</h4>
                <ul>
                    <?php while ($project = mysqli_fetch_assoc($past_due_result)) { ?>
                        <li>
                            <a href="view_project.php?project_id=<?php echo $project['project_id']; ?>">
                                <strong><?php echo htmlspecialchars($project['project_name']); ?></strong>
                            </a>
                            <p>Due Date: <?php echo htmlspecialchars($project['due_date']); ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>


            <div class="completed">
                <h4>Completed Projects</h4>
                <ul>
                    <?php while ($project = mysqli_fetch_assoc($completed_result)) { ?>
                        <li>
                            <a href="view_project.php?project_id=<?php echo $project['project_id']; ?>">
                                <strong><?php echo htmlspecialchars($project['project_name']); ?></strong>
                            </a>
                            <p>Due Date: <?php echo htmlspecialchars($project['due_date']); ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab");
            const upcomingContainer = document.querySelector(".upcoming");
            const pastDueContainer = document.querySelector(".past-due");
            const completedContainer = document.querySelector(".completed");

            tabs.forEach(tab => {
                tab.addEventListener("click", function () {
                    tabs.forEach(t => t.classList.remove("active"));
                    this.classList.add("active");


                    upcomingContainer.style.display = "none";
                    pastDueContainer.style.display = "none";
                    completedContainer.style.display = "none";


                    if (this.id === "upcoming-tab") {
                        upcomingContainer.style.display = "block";
                    } else if (this.id === "past-due-tab") {
                        pastDueContainer.style.display = "block";
                    } else if (this.id === "completed-tab") {
                        completedContainer.style.display = "block";
                    }
                });
            });

            document.querySelectorAll(".project-container li").forEach(item => {
                item.addEventListener("click", function () {
                    const projectLink = this.querySelector("a");
                    if (projectLink) {
                        window.location.href = projectLink.href; 
                    }
                });
            });
        });
    </script>

</body>
</html>
