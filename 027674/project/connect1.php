<?php

$host = "localhost"; #127.0.0.1
$username = "root";
$password = "";
$dbname = "taskflow1";

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn) {
    #echo "connect success";
} else {
    echo "connect failed";
mysqli_connect_error();
}

#$sql = "SELECT user_id, username, email"

?>