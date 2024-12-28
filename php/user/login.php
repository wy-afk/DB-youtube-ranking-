<html>

<body>

	<?php
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
		echo "Account not found.<br>";
		header("Location: ./login.html");
		exit();
	}

	// Check if the password matches the query result.
	if ($result->fetch_all(MYSQLI_ASSOC)[0]["pwd"] == $hashed_password) {
		header("Location: ./analyze.html");
	}


	$result->close();
	exit();
	?>

</body>

</html>