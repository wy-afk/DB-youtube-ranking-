<?php
	include "../database/connect.php";

    $stmt = $conn->stmt_init();

    // Country & category input.
    $country = $_POST["country"];
    $category = $_POST["category"];

    // Convert country name to country id
    $country_ID = $conn->query("SELECT country_id AS id FROM countries c WHERE c.name = $country")->fetch_assoc()["id"];
    $category_ID = $conn->query("SELECT category_id AS id FROM categories c WHERE c.name = $category")->fetch_assoc()["id"];

    // TODO: Replace __sql__ with the SQL command
    $sql = "SELECT video_id, title, thumbnail_link, published_at, likes, dislikes, FROM " . $country_ID . "_youtube_trending_data WHERE category_id = $category_ID LIMIT 10";

    // NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
    $result = $conn->get_result();
    if(!$result){
        header("Location: ../../main_pages/analyze.html");
        $result->close();
        exit();
    }

    $videos = $result->fetch_all(MYSQLI_ASSOC);

    // TODO: further process of the fetched data.

    $result->close();
    exit();
?>