<?php
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
DELETE FROM song_queue;
";
$result = $conn->query($sql);

$conn->close();
?>


4716666