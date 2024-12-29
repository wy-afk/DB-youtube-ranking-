<?php
	session_start(); 
	include "../database/connect.php";

    $stmt = $conn->stmt_init();

    // Username & password input.
    $input_username = $_POST["signup-username"];
    $input_password = $_POST["signup-password"];

    // Check if the user already exists.
    $redirect = "";
    $duplicate_check = $conn->query("SELECT * FROM user WHERE username = '$input_username'");
    if($duplicate_check->num_rows > 0){
        $redirect = "../../main_pages/signup.html?err=UsernameExists";
    }
    else{
        $redirect = "../../main_pages/login.html";

        // Password hashing.
        $hashed_password = hash("sha256", $input_password);

        // Update database with stmt sql command.
        $sql = "INSERT INTO user (username, user_password) VALUES ('$input_username', '$hashed_password')";
        $conn->query($sql);
    }

    $duplicate_check->close();
    header("Location: $redirect");
?>