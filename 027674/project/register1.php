<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('connect1.php');

$success_message = "";
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    if (strlen($password) < 6) {
        $error_message = "Password must be at least 6 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $error_message = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $error_message = "Password must contain at least one number.";
    } else {

        $check_username = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $check_username);
        
        if (mysqli_num_rows($result) > 0) {
            $error_message = "Username is already taken. Please choose another one.";
        } else {

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            
            if (mysqli_query($conn, $sql)) {
                $new_member_name = $username;


                $message = "A new member has joined: $new_member_name";


                $notification_sql = "INSERT INTO notifications (user_id, message, created_at) 
                                     SELECT user_id, '$message', NOW() 
                                     FROM users";

                if (mysqli_query($conn, $notification_sql)) {
                    $success_message = "Successfully registered! You can now <a href='login1.php'>Login</a>.";
                } else {
                    $error_message = "Error inserting notification: " . mysqli_error($conn);
                }
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Sign Up</title>
    <link rel="stylesheet" href="page1.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h1>Welcome to <br> TaskFlow</h1>
            <div class="buttons">
                <button class="login" onclick="window.location.href='login1.php'">Login</button>
                <button class="signup" onclick="window.location.href='register1.php'">Sign Up</button>
            </div>
        </div>
        <div class="right-column">
            <div class="signup-form">
                <h2>Sign Up</h2>
                <?php if (!empty($success_message)): ?>
                    <p class="signupsuccess"><?php echo $success_message; ?></p>
                <?php else: ?>
                    <form method="POST" action="register1.php">
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="submit-button">SIGN UP</button>
                        <p class="error-message"><?php echo !empty($error_message) ? $error_message : ''; ?></p>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
