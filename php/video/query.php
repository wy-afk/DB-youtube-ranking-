<?php
$stmt = $conn->stmt_init();

// Username & password input. Replace $_POST with $_GET if the form method is set to "GET"
$country = $_POST["country"];
$category = $_POST["country"];

// Convert country name to country id
$country_ID = $conn->query("SELECT country_id AS id FROM Countries c WHERE c.name = $country")->fetch_assoc()["id"];

// TODO: Replace __sql__ with the SQL command
$sql = "__sql__";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);

$stmt->execute();

// NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
$result = $stmt->get_result();
if(!$result){
    echo "Query Failed.<br>";
    exit();
}

$videos = $result->fetch_all(MYSQLI_ASSOC);

// TODO: further process of the fetched data.

$result->close();
exit();
?>