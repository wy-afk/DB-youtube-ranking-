<?php
	require $_SERVER['DOCUMENT_ROOT']."/php/database/connect.php";

    // $search_term = "ap";
	$search_term = $_POST["search-term"];
    if($search_term == '') exit();

    $country_IDs = ["BR", "CA", "DE", "FR", "GB", "IN", "JP", "KR", "MX", "RU", "US"]; // country list
    $videos = [];

    $count = 0;

    foreach($country_IDs as $cID){
        $sql_fmt = 
            "SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, MAX(view_count) as view_count
            FROM " . $cID . "_youtube_trending_data
            WHERE title LIKE '%" . $search_term . "%'
            GROUP BY title, video_id, thumbnail_link, published_at, likes
            ORDER BY MAX(view_count);";

        $result = $conn->query($sql_fmt);

        if(!$result){
            continue;
        }

        $videos = array_merge($videos, $result->fetch_all(MYSQLI_ASSOC));
    }

    echo "<p id=\"successmsg\" class=\"success\">Found " . sizeof($videos) . " results.<br></p>";
    // $videos = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($videos as $video) {
        echo "<h3><a href=\"https://youtu.be/" . $video["video_id"] . "\">" . $video["title"] . "</a></h3>";
        echo "<p>";
        echo "<img id = \"thumbnail\" src=" . $video["thumbnail_link"] . "><br>";
        echo "Published at " . $video["published_at"] . ", " . $video["view_count"] . " views, " . $video["likes"] . " likes<br>";
        echo "</p>";
    }
?>