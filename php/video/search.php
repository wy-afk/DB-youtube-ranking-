<?php
	require $_SERVER['DOCUMENT_ROOT']."/php/database/connect.php";

	$search_term = $_POST["search-term"];

    $country_IDs = ["BR", "CA", "DE", "FR", "GB", "IN", "JP", "KR", "MX", "RU", "US"]; // country list
    $videos = [];

    $sql_fmt = 
        "SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, view_count
            FROM %s_youtube_trending_data
            WHERE title LIKE '%%s%'";
    
    foreach($country_IDs as $cID){
        $sql = sprintf($sql_fmt, $cID, $search_term);
        $result = $conn->query($sql);

        if(!$result){
            continue;
        }

        $videos = array_merge($videos, $result->fetch_all(MYSQLI_ASSOC));
    }

    echo "<p id=\"errmsg\" class=\"error\">Found " . $result->num_rows . " results.<br></p>";
    $videos = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($videos as $video) {
        echo "<h3><a href=\"https://youtu.be/" . $video["video_id"] . "\">" . $video["title"] . "</a></h3>";
        echo "<p>";
        echo "<img id = \"thumbnail\" src=" . $video["thumbnail_link"] . "><br>";
        echo "Published at " . $video["published_at"] . ", " . $video["view_count"] . " views, " . $video["likes"] . " likes<br>";
        echo "</p>";
    }
?>