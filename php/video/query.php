<?php
    include "../database/connect.php";

    // Country & category input.
    $country = $_POST["country"];
    $category = $_POST["category"];

    // Convert country name to country id
    $country_ID = $conn->query("SELECT country_id AS id FROM countries c WHERE c.name = $country")->fetch_assoc()["id"];

    // TODO: Replace __sql__ with the SQL command
    $sql = 
        "SELECT DISTINCT d.title as title, d.channel_title as channel, MAX(d.view_count) as view_count
            FROM " . $country_ID . "_youtube_trending_data as d -- 改這裡
            WHERE category_id IN (
                SELECT c.category_id AS id
                FROM categories AS c
                WHERE STRCMP(c.name, " . $category . ") = 0 -- 改這裡
            )
            GROUP BY title, channel
            ORDER BY view_count DESC
            LIMIT 10;";

    // NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
    $result = $conn->query($sql);
    if(!$result){
        echo "<p id=\"errmsg\" class=\"error\">Error: Cannot find video data with given constraints.<br></p>";
    }
    else{
        $cnt = 1;
        while ($videos = $result->fetch_assoc()) {
            echo "<h3>$cnt. <a href=\"https://youtu.be/" . $videos["video_id"] . "\">" . $videos["title"] . "</a></h3>";
            echo "<p>";
            echo "<img id = \"thumbnail\" src=\"" . $videos["thumbnail_link"] . "\"><br>";
            echo "published at " . $videos["published_at"] . ", " . $videos["likes"] . " likes.<br>";
            echo "</p>";

            $cnt++;
        }
    }

    $result->close();
    exit();
?>