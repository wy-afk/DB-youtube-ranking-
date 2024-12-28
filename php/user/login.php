<?php

// Username & password input. Replace $_POST with $_GET if the form method in html is set to "GET"
$input_username = $_POST["username"];
$input_password = $_POST["password"];

// Password hashing.
$hashed_password = hash("sha256", $input_password);

// Query with stmt sql command.
$sql = "SELECT user.user_password AS pwd FROM user WHERE user.username = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $input_username);
$stmt->execute();

$result = $stmt->get_result();

// If the input username is not found in the database(result size = 0), then aborts.
if(!$result || $result->num_rows != 1){
    echo "Account not found.<br>";
    exit();
}

// Check if the password matches the query result.
// Can use $login_status for further steps.
$login_status = ($result->fetch_all(MYSQLI_ASSOC)[0]["pwd"] == $hashed_password);

$result->close();
exit();
?>