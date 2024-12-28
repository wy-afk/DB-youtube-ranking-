<?php
// NOTE: derivated from Mido's SQL codes.

// Login
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "youtube_trending_video";

$conn_init = new mysqli($servername, $username, $password);

// Create database
$conn_init->query("CREATE DATABASE $database; USE $database;");

// Create tables
$country_IDs = ["BR", "CA", "DE", "FR", "GB", "IN", "JP", "KR", "MX", "RU", "US"];
$sql_fmt = [
	"CREATE TABLE ", 
	"_youtube_trending_data (
		video_id VARCHAR(200), title TEXT, published_at TIMESTAMP,
		channel_id TEXT, channel_title TEXT, category_id INT, trending_date TIMESTAMP,
		tags TEXT, view_count INT, likes INT, dislikes INT,
		comment_count INT, thumbnail_link TEXT, comments_disabled BOOL, ratings_disabled BOOL,
		description TEXT, country_id VARCHAR(2), PRIMARY KEY (video_id)
	);"
];

foreach($country_IDs as $cID){
	$sql = $sql_fmt[0]. $cID . $sql_fmt[1];
	$conn_init->query($sql);
}

// Load data
$sql_fmt = [
	"LOAD DATA LOCAL INFILE '",
	"_youtube_trending_data.csv' INTO TABLE ",
	"_youtube_trending_data FIELDS TERMINATED BY ',' IGNORE 1 ROWS;"
];

foreach($country_IDs as $cID){
	$sql = $sql_fmt[0] . $cID . $sql_fmt[1] . $cID . $sql_fmt[2];
	$conn_init->query($sql);
}

$conn_init->close();

echo "Initialization completed.<br>";
exit();
?>