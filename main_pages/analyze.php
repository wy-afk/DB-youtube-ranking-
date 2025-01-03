<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YouTube Trending Analytics</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee Hairline">
	<script src="script.js" defer></script>
</head>
<body>
	<header>
		<img id="logo" src="logo.png" alt="Website Logo" width="100" height="75">
		<h1>YouTube Trending Analytics</h1>
	</header>

	<nav>
        <ul>
            <a href="./about.html"> About </a> | 
            <a href="./login.html"> Login </a> | 
            <a href="./signup.html"> Signup </a> | 
            <a href="./search.php"> Search </a> | 
            <a href="./update.html"> Update </a> | 
            <a href="./analyze.php"> Analyze </a> | 
            <a href="./create.html"> Create </a> |
            <a href="./delete.html"> Delete </a>
        </ul>
	</nav>

	<main class="main">
		<section id="visualization">
			<h2>Trending Video Analysis</h2>

			<form action="./analyze.php", method="POST">
				<label for="country">Select Country:</label>
				<select id="country" name="country">
					<option value="US">United States</option>
					<option value="GB">Great Britain</option>
					<option value="IN">India</option>
					<option value="FR">France</option>
					<option value="BR">Brazil</option>
					<option value="JP">Japan</option>
					<option value="RU">Russia</option>
					<option value="CA">Canada</option>
					<option value="KR">Korea</option>
					<option value="DE">Germany</option>
					<option value="MX">Mexico</option>
				</select>

				<label for="category">Select Category:</label>
				<select id="category" name="category">
					<option value="Film & Animation">Film & Animation</option>
					<option value="Autos & Vehicles">Autos & Vehicles</option>
					<option value="Music">Music</option>
					<option value="Pets & Animals">Pets & Animals</option>
					<option value="Sports">Sports</option>
					<option value="Short Movies">Short Movies</option>
					<option value="Travel & Events">Travel & Events</option>
					<option value="Gaming">Gaming</option>
					<option value="Videoblogging">Videoblogging</option>
					<option value="People & Blogs">People & Blogs</option>
					<option value="Comedy">Comedy</option>
					<option value="Entertainment">Entertainment</option>
					<option value="News & Politics">News & Politics</option>
					<option value="Howto & Style">Howto & Style</option>
					<option value="Education">Education</option>
					<option value="Science & Technology">Science & Technology</option>
					<option value="Movies">Movies</option>
					<option value="Anime/Animation">Anime/Animation</option>
					<option value="Action/Adventure">Action/Adventure</option>
					<option value="Classics">Classics</option>
					<option value="Comedy">Comedy</option>
					<option value="Documentary">Documentary</option>
					<option value="Drama">Drama</option>
					<option value="Family">Family</option>
					<option value="Foreign">Foreign</option>
					<option value="Horror">Horror</option>
					<option value="Sci-Fi/Fantasy">Sci-Fi/Fantasy</option>
					<option value="Thriller">Thriller</option>
					<option value="Shorts">Shorts</option>
					<option value="Shows">Shows</option>
					<option value="Trailers">Trailers</option>
					<option value="Entertainment">Entertainment</option>
				</select>

				<button type="submit">Search</button>
			</form>

			<div id="chart-container">
				<!-- Placeholder for dynamic chart rendering

					format:

					<h3>$cnt. <a href="https://youtu.be/$video_id">$titles</a></h3>
                    <p>
                        <img id = "thumbnail" src="$thumbnail_link"><br>
                        published at $pubTime, $likecount likes.<br>
                    </p>
					...
				-->
                <?php
                    require "../php/video/query.php";
                ?>
            </div>

		</section>
	</main>

	<footer class="footer">&copy; 2024 YouTube Trending Analytics. All rights reserved.</footer>
	
</body>
</html>