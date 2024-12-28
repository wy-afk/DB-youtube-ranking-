<?php

// Username & password input. Replace $_POST with $_GET if the form method in html is set to "GET"
$input_username = $_POST["username"];
$input_password = $_POST["password"];

// Password hashing.
$hashed_password = hash("sha256", $input_password);

$find_user = $conn -> query("SELECT ");

// Query with stmt sql command.
$sql = "INSERT INTO user (name, user_password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $input_username, $hashed_password);
$stmt->execute();

exit();
?>