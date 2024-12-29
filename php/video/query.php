<?php
    include "../database/connect.php";

    // Country & category input.
    $country = $_POST["country"];
    $category = $_POST["category"];

    // Convert country name to country id
    $country_ID = $conn->query("SELECT country_id AS id FROM countries c WHERE c.name = $country")->fetch_assoc()["id"];
    $category_ID = $conn->query("SELECT category_id AS id FROM categories c WHERE c.name = $category")->fetch_assoc()["id"];

    // TODO: Replace __sql__ with the SQL command
    $sql = "SELECT video_id, title, thumbnail_link, published_at, likes FROM " . $country_ID . "_youtube_trending_data WHERE category_id = $category_ID LIMIT 10";

    // NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
    $result = $conn->get_result();
    if(!$result){
        echo "<p id=\"errmsg\" class=\"error\">Error: Cannot find video data with given constraints.<br></p>";
        $result->close();
        exit();
    }

    $cnt = 1;
    while ($videos = $result->fetch_assoc()) {
        echo "<h3>$cnt. <a href=\"https://youtu.be/" . $videos["video_id"] . "\">" . $videos["title"] . "</a></h3>";
        echo "<p>";
        echo "<img id = \"thumbnail\" src=\"" . $videos["thumbnail_link"] . "\"><br>";
        echo "published at " . $videos["published_at"] . ", " . $videos["likes"] . " likes.<br>";
        echo "</p>";

        $cnt++;
    }

    $result->close();
    exit();
?>