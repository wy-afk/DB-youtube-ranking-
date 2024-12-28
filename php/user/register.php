<?php
$stmt = $conn->stmt_init();

// Username & password input.
// TODO: Replace $_POST with $_GET if the form method in html is set to "GET"
$input_username = $_POST["username"];
$input_password = $_POST["password"];

// Check if the user already exists.
$duplicate_check = $conn -> query("SELECT user.user_password AS pwd FROM user WHERE user.username = $input_username");
if($duplicate_check->num_rows > 0){
    echo "Username not avaliable.<br>";
    exit();
}
$duplicate_check->close();

// Password hashing.
$hashed_password = hash("sha256", $input_password);

// Update database with stmt sql command.
$sql = "INSERT INTO user (name, user_password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $input_username, $hashed_password);

$stmt->execute();

exit();
?>