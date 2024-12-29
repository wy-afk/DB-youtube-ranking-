<?php
	session_start(); 
	include "../database/connect.php";

	$stmt = $conn->stmt_init();

	// Username & password input. Replace $_POST with $_GET if the form method in html is set to "GET"
	$input_username = $_POST["username"];
	$input_password = $_POST["password"];

	// Password hashing.
	$hashed_password = hash("sha256", $input_password);

	// Query with stmt sql command.
	$sql = "SELECT user.user_password AS pwd FROM user WHERE user.username = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $input_username);

	$stmt->execute();

	$result = $stmt->get_result();

	// If the input username is not found in the database(result size = 0), then aborts.
	if (!$result || $result->num_rows != 1) {
		header("Location: ../../main_pages/login.html");
		exit();
	}

	// Check if the password matches the query result.
	$redirect = "";
	if ($result->fetch_all(MYSQLI_ASSOC)[0]["pwd"] == $hashed_password) {
		$redirect = "../../main_pages/analyze.html";
	}
	else{
		$redirect = "../../main_pages/login.html";
	}
	
	$result->close();
	header("Location: $redirect");
?>