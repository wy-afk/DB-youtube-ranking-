<?php
    session_start(); 
    include "../database/connect.php";

    $stmt = $conn->stmt_init();

    // Input
    $country_id = $_POST["country"];
	$category = $_POST["category"];
    // $country = "United States";
    // $category = "Music";
    echo $country_id, "<br>";

    // Get category id
    $stmt = $conn->stmt_init();
    $stmt -> prepare("SELECT category_id AS id FROM categories c WHERE c.category_name = ?");
    $stmt -> bind_param("s", $category);
    $stmt -> execute();
    $stmt -> bind_result($category_id);
    $stmt -> fetch();
    echo "category id: ", $category_id, "<br>";

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
    echo "query successful<br>";
    if($result->num_rows > 0){
        // while($row = $result->fetch_assoc()){
        //     echo "title: ", $row["title"], "<br>";
        // }
        header("Location: ../../main_pages/analyze.html?res=True");
    }
    else{
        // echo "No results found<br>";
        header("Location: ../../main_pages/analyze.html?res=False");
    }

    // header("Location: ../../main_pages/create.html?success");
    // header("Location: $redirect");

?>