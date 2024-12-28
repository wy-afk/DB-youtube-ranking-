<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "final";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	echo "Connection failed: $conn->connect_error <br>";
	exit();
}

?>