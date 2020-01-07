l<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "sandbox";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
CREATE TABLE song_queue (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(100),
thumbnail_url VARCHAR(100),
title VARCHAR(100),
duration INT,
status BIT);
";

$result = $conn->query($sql);
$conn->close();
echo $result;
?>