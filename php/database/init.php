<?php
// NOTE: derivated from Mido's SQL codes.

// Login
$servername = "localhost";
$username = "root";
$password = "";
$database = "youtube_trending_video";

$conn_init = new mysqli($servername, $username, $password);
if(!$conn_init){
	echo "Connection Failed.<br>";
	exit();
}
$conn_init->options(MYSQLI_OPT_LOCAL_INFILE, true);

echo "MySQL connected.<br>";

// Create database
$conn_init->query("CREATE DATABASE $database");
$conn_init->close();

$conn_init = new mysqli($servername, $username, $password, $database);

echo "Database created successfully.<br>";

// Create tables
$country_IDs = ["BR", "CA", "DE", "FR", "GB", "IN", "JP", "KR", "MX", "RU", "US"];
$sql_fmt = [
	"CREATE TABLE ", 
	"_youtube_trending_data (
		video_id VARCHAR(200), title TEXT, published_at TIMESTAMP,
		channel_id VARCHAR(200), channel_title VARCHAR(200), category_id INT, trending_date TIMESTAMP,
		tags TEXT, view_count INT, likes INT, dislikes INT,
		comment_count INT, thumbnail_link TEXT, comments_disabled BOOLEAN, ratings_disabled BOOLEAN,
		description TEXT, country_id VARCHAR(2), PRIMARY KEY (video_id, trending_date)
	)"
];

foreach($country_IDs as $cID){
	$sql = $sql_fmt[0]. $cID . $sql_fmt[1];
	$conn_init->query($sql);
}

$conn_init->query("CREATE TABLE categories( name VARCHAR(50), category_id VARCHAR(2), PRIMARY KEY (name) )");
$conn_init->query("CREATE TABLE countries( name VARCHAR(50), country_id VARCHAR(2), PRIMARY KEY (country_id) )");
$conn_init->query("CREATE TABLE user( username VARCHAR(200), user_id int NOT NULL AUTO_INCREMENT, user_password VARCHAR(100), PRIMARY KEY (user_id) )");

echo "Tables created successfully.<br>";

// Load data
$sql_fmt = [
	"LOAD DATA LOCAL INFILE '",
	"_youtube_trending_data.csv' INTO TABLE ",
	"_youtube_trending_data FIELDS TERMINATED BY ',' IGNORE 1 ROWS"
];

foreach($country_IDs as $cID){
	$sql = $sql_fmt[0] . $cID . $sql_fmt[1] . $cID . $sql_fmt[2];
	$conn_init->query($sql);
}

echo "Dataset loaded successfully.<br>";

$conn_init->close();

echo "Initialization completed.<br>";
exit();
?>