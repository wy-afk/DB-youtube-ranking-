<?php
$stmt = $conn->stmt_init();

// parameters
$video_id = "";

// replace __sql__ with the SQL command
$sql = "__sql__";
$stmt = $conn->prepare($sql);
$stmt->bind_param("", $video_id);

$stmt->execute();

?>