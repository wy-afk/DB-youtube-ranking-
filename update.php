<?php
    session_start(); 
    include "../database/connect.php";

    // parameters
    $link = $_POST["video-link"];
    $title = $_POST["video-title"];
    $views =$_POST["view-count"];
    $video_id = substr($link, 32, 11);

    // Update videos
    $stmt = $conn->stmt_init();
    $stmt -> prepare("UPDATE US_youtube_trending_data SET view_count = ? WHERE video_id = ? AND view_count < ?");
    $stmt -> bind_param("isi", $views, $video_id, $views);
    $stmt -> execute();

    header("Location: ../../main_pages/update.html?success");

?>