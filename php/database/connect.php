<?php
$servername = "localhost";
$username = "root";
$password = "lala1222";
$database = "youtube_trending_video";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
	echo "Connection failed.<br>";
	exit();
}

?>