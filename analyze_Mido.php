<?php
    session_start(); 
    include "../database/connect.php";

    $stmt = $conn->stmt_init();

    // Input
    $country_id = $_POST["country"];
	$category = $_POST["category"];
    // echo $country_id, "<br>";

    // Get category id
    $stmt = $conn->stmt_init();
    $stmt -> prepare("SELECT category_id AS id FROM categories c WHERE c.category_name = ?");
    $stmt -> bind_param("s", $category);
    $stmt -> execute();
    $stmt -> bind_result($category_id);
    $stmt -> fetch();
    // echo "category id: ", $category_id, "<br>";

    // Get queries
    $stmt = $conn->stmt_init();
    $table = "{$country_id}_youtube_trending_data";
    $fmt = "SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, MAX(view_count)AS view_count
        FROM (
            SELECT DISTINCT d.title, d.channel_title, d.video_id, d.thumbnail_link, d.published_at, d.likes, d.view_count
            FROM {$table} AS d
            WHERE d.category_id = {$category_id}
            UNION
            SELECT DISTINCT u.title, u.channel_title, u.video_id, u.thumbnail_link, u.published_at, u.likes, u.view_count
            FROM user_upload AS u
            WHERE u.category_id = {$category_id} AND u.country_id = '$country_id'
        ) AS agg
        GROUP BY title, video_id, thumbnail_link, published_at, likes
        ORDER BY view_count DESC
        LIMIT 30";

    // NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
    $result = $conn->query($fmt);
    // echo "query successful<br>";

    // Send query result
    if($result->num_rows > 0){
        // Show results
        $cnt = 1;
		while ($videos = $result->fetch_assoc()) {
            // echo $videos["video_id"], "<br>", $videos["title"], "<br>", $videos["thumbnail_link"], "<br>", $videos["published_at"], "<br>", $videos["view_countr"], "<br>", $videos["likes"];
			echo sprintf('<h3>%d. <a href="https://youtu.be/%s">%s</a></h3>', $cnt, $videos["video_id"], $videos["title"]);
			echo "<p>";
			echo sprintf('<img id = "thumbnail" src="%s"><br>', $videos["thumbnail_link"]);
			echo sprintf("Published at %s, view count: %d, %d likes", $videos["published_at"], $videos["view_count"], $videos["likes"]);
			echo "</p>";

			$cnt++;
		}
    }
    else{
		echo "<p id=\"successmsg\" class=\"success\">No video found with given constraints.<br></p>";
    }

    $result->close();
	exit();

?>