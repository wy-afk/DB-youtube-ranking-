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
$conn_init->query( // countries
	"CREATE TABLE countries(
		country_name VARCHAR(50),
		country_id VARCHAR(2),
		PRIMARY KEY (country_id)
	);"
);

$conn_init->query( // categories
	"CREATE TABLE categories(
		category_name VARCHAR(50),
		category_id int NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (category_id)
	);"
);

$country_IDs = ["BR", "CA", "DE", "FR", "GB", "IN", "JP", "KR", "MX", "RU", "US"]; // country list

$sql_fmt = 
	"CREATE TABLE %s_youtube_trending_data (
		video_id VARCHAR(200),
		title TEXT,
		published_at TIMESTAMP,
		channel_id VARCHAR(200),
		channel_title VARCHAR(200),
		category_id INT,
		trending_date TIMESTAMP,
		tags TEXT,
		view_count INT,
		likes INT,
		dislikes INT,
		comment_count INT,
		thumbnail_link TEXT,
		comments_disabled BOOLEAN,
		ratings_disabled BOOLEAN,
		descript TEXT,
		country_id VARCHAR(2) DEFAULT \"%s\",
		PRIMARY KEY (video_id, trending_date),
		FOREIGN KEY (country_id) REFERENCES countries(country_id),
		FOREIGN KEY (category_id) REFERENCES categories(category_id)
	);";

foreach($country_IDs as $cID){ // XX_youtube_trending_data
	$sql = sprintf($sql_fmt, $cID, $cID);
	$conn_init->query($sql);
}

$conn_init->query( // user upload
	"CREATE TABLE user_upload (
		video_id VARCHAR(200),
		title TEXT,
		published_at TIMESTAMP,
		channel_id VARCHAR(200),
		channel_title VARCHAR(200),
		category_id INT,
		trending_date TIMESTAMP,
		tags TEXT,
		view_count INT,
		likes INT,
		dislikes INT,
		comment_count INT,
		thumbnail_link TEXT,
		comments_disabled BOOLEAN,
		ratings_disabled BOOLEAN,
		descript TEXT,
		country_id VARCHAR(2),
		PRIMARY KEY (video_id, trending_date),
		FOREIGN KEY (country_id) REFERENCES countries(country_id),
		FOREIGN KEY (category_id) REFERENCES categories(category_id)
	);"
);

$conn_init->query( // user
	"CREATE TABLE user(
		username VARCHAR(200),
		user_id int NOT NULL AUTO_INCREMENT,
		user_password VARCHAR(100),
		PRIMARY KEY (user_id)
	);"
);

echo "Tables created successfully.<br>";

// Hard-coded data
$conn_init->query( // user: admin account
	"INSERT INTO user (username, user_password)
	VALUES('admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');"
);

$conn_init->query( // countries: country list
	"INSERT INTO countries (country_name, country_id)
		VALUES ('United States', 'US'),
		('Brazil', 'BR'),
		('Canada', 'CA'),
		('Germany', 'DE'),
		('France', 'FR'),
		('Great Britain', 'GB'),
		('India', 'IN'),
		('Japan', 'JP'),
		('Mexico', 'MX'),
		('Russia', 'RU'),
		('Korea', 'KR');"
);

$conn_init->query( // categories: category list
	"INSERT INTO categories (category_name, category_id)
		VALUES ('Howto & Style', 26),
		('Music', 10),
		('Film & Animation', 1),
		('Autos & Vehicles', 2),
		('Pets & Animals', 15),
		('Sports', 17),
		('Short Movies', 18),
		('Travel & Events', 19),
		('Gaming', 20),
		('Videoblogging', 21),
		('People & Blogs', 22),
		('Comedy', 23),
		('Entertainment', 24),
		('News & Politics', 25),
		('Education', 27),
		('Science & Technology', 28),
		('Movies', 30),
		('Anime/Animation', 31),
		('Classics', 33),
		('Comedy', 34),
		('Documentary', 35),
		('Drama', 36),
		('Family', 37),
		('Foreign', 38),
		('Horror', 39),
		('Sci-Fi/Fantasy', 40),
		('Thriller', 41),
		('Shorts', 42),
		('Shows', 43),
		('Trailers', 44),
		('Nonprofits & Activism', 29),
		('Action/Adventure', 32);"
);

echo("Hard-coded data import finished.<br>");

// See if it releases som ram?
$conn_init->close();
$conn_init = new mysqli($servername, $username, $password, $database);

// Load data
$sql_fmt =
	"LOAD DATA LOCAL INFILE './dataset/%s_youtube_trending_data.csv'
	INTO TABLE BR_youtube_trending_data
	FIELDS TERMINATED BY ','
	OPTIONALLY ENCLOSED BY '\"'
	IGNORE 1 ROWS;";

foreach($country_IDs as $cID){
	$sql = sprintf($sql_fmt, $cID);
	$conn_init->query($sql);
}

echo "Dataset loaded successfully.<br>";

$conn_init->close();

echo "Initialization completed.<br>";
exit();
?>