<?php

// Username & password input. Replace $_POST with $_GET if the form method is set to "GET"
$country = $_POST["country"];
$category = $_POST["country"];

// Convert country name to country id
$country_ID = $conn->query("SELECT country_id AS id FROM Countries c WHERE c.name = $country")->fetch_assoc()["id"];

// replace __sql__ with the SQL command
$sql = "__sql__";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $country, $category);
$stmt->execute();

$video_result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

?>