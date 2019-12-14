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
INSERT INTO song_queue (url, thumbnail_url, title, duration, status) VALUES ('https://www.youtube.com/watch?v=_l09H-3zzgA','https://i.ytimg.com/vi/_l09H-3zzgA/mqdefault.jpg','The Strokes - Under Cover of Darkness This is a test of an exremely long title idk if it will even work bcuz max size is 100 char',265,0);";
$result = $conn->query($sql);

$conn->close();
?>

