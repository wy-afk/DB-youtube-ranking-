<?php
// replace __sql__ with the SQL command
$sql = "__sql__";
$stmt = $conn->prepare($sql);

$video_id = "";


$stmt->bind_param("", $video_id);
$stmt->execute();


?>