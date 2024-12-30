<?php
	require $_SERVER['DOCUMENT_ROOT']."/php/database/connect.php";

	// Country & category input & Convert country name to country id
	$country = $_POST["country"];
	$category = $_POST["category"];
	$category_ID = $conn->query("SELECT c.category_id AS id FROM categories AS c WHERE STRCMP(c.category_name, '$category') = 0")->fetch_assoc()["id"];

	$conn->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

	// TODO: Replace __sql__ with the SQL command
	$sql = 
		"SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, MAX(view_count)AS view_count
			FROM (
				SELECT DISTINCT d.title, d.channel_title, d.video_id, d.thumbnail_link, d.published_at, d.likes, d.view_count
				FROM " . $country . "_youtube_trending_data AS d
				WHERE d.category_id = {$category_ID}
				UNION
				SELECT DISTINCT u.title, u.channel_title, u.video_id, u.thumbnail_link, u.published_at, u.likes, u.view_count
				FROM user_upload AS u
				WHERE u.category_id = {$category_ID} AND u.country_id = '$country'
			) AS agg
			GROUP BY title, video_id, thumbnail_link, published_at, likes
			ORDER BY view_count DESC
			LIMIT 30";

	$result = $conn->query($sql);
	if(!$result){
		echo "<p id=\"errmsg\" class=\"error\">Error: Cannot find video data with given constraints.<br></p>";
	}
	else if($result->num_rows == 0) {
		echo "<p id=\"errmsg\" class=\"error\">No videos found with selected filter.<br></p>";
	}
	else{
		$cnt = 1;
		$videos = $result->fetch_all(MYSQLI_ASSOC);

		foreach ($videos as $video) {
			echo "<h3>" . $cnt . ". <a href=\"https://youtu.be/" . $video["video_id"] . "\">" . $video["title"] . "</a></h3>";
			echo "<p>";
			echo "<img id = \"thumbnail\" src=" . $video["thumbnail_link"] . "><br>";
			echo "Published at " . $video["published_at"] . ", view count: " . $video["view_count"] . ", " . $video["likes"] . " likes<br>";
			echo "</p>";

			$cnt++;
		}
	}

	$result->close();
	exit();
?>