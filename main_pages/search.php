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
        <section id="search">
            <h2>Search Videos</h2>
            <form action="./search.php", method="POST">
                <label for="search-term">Search:</label>
                <input type="text" id="search-term" name="search-term" placeholder="Enter video name or keyword">

                <button type="submit">Search</button>
            </form>
            
            <?php
                require "../php/video/search_q.php";
            ?>

        </section>
    </main>

    <footer class="footer">&copy; 2024 YouTube Trending Analytics. All rights reserved.</footer>
    
</body>
</html>