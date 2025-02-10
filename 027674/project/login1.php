<?php
session_start();
include('connect1.php');
$message = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id']; 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['role'] = $row['role'];

        header("Location: homepage.php");
        exit();
    } else {
        $message = "Username or password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Login</title>
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
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST" action="login1.php">
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="submit-button">LOGIN</button>
                    <?php if (!empty($message)) { echo "<p class='error-message'>$message</p>"; } ?>
                </form>
                <p>Don't have an account? <a href="register1.php">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
</html>