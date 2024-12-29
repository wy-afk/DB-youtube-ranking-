<?php
	require $_SERVER['DOCUMENT_ROOT']."/php/database/connect.php";

	// Country & category input & Convert country name to country id
	$country = $_POST["country"];
	$category = $_POST["category"];
	$category_ID = $conn->query("SELECT c.category_id AS id FROM categories AS c WHERE STRCMP(c.category_name, '$category') = 0")->fetch_assoc()["id"];

	$conn->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

	// TODO: Replace __sql__ with the SQL command
	$sql_fmt = 
		"SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, MAX(view_count)AS view_count
			FROM (
				SELECT DISTINCT d.title, d.channel_title, d.video_id, d.thumbnail_link, d.published_at, d.likes, d.view_count
				FROM %s_youtube_trending_data AS d
				WHERE d.category_id = $category_ID
				UNION
				SELECT DISTINCT u.title, u.channel_title, u.video_id, u.thumbnail_link, u.published_at, u.likes, u.view_count
				FROM user_upload AS u
				WHERE u.category_id = $category_ID AND u.country_id = \"$country\"
			) AS agg
			GROUP BY title, channel_title
			ORDER BY MAX(view_count) DESC
			LIMIT 10;";

	// NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
	$result = $conn->query(sprintf($sql_fmt, $country));
	if(!$result){
		echo "<p id=\"errmsg\" class=\"error\">Error: Cannot find video data with given constraints.<br></p>";
	}
	else{
		$cnt = 1;
		echo "<p id=\"errmsg\" class=\"error\">Debug: result has $result->num_rows rows<br></p>";

		while ($videos = $result->fetch_assoc()) {
			echo sprintf('<h3>$d. <a href="https://youtu.be/%s">%s</a></h3>', $cnt, $videos["video_id"], $videos["title"]);
			echo "<p>";
			echo sprintf('<img id = "thumbnail" src="%s"><br>', $videos["thumbnail_link"]);
			echo sprintf("Published at %s, view count: %d, %d likes", $videos["published_at"]->format('Y-m-d H:i:s'), $videos["view_count"], $videos["likes"]);
			echo "</p>";

			$cnt++;
		}
	}

	$result->close();
	exit();
?>