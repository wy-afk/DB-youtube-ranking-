<?php
    session_start(); 
    include "../database/connect.php";

    $stmt = $conn->stmt_init();

    // Input
    $link = $_POST["video-link"];
    $title = $_POST["video-title"];
    $views =$_POST["view-count"];
    $channel = $_POST["channel"];
    $country = $_POST["country"];
    $category = $_POST["category"];
    $video_id = substr($link, 32, 11);

    // Check if link is valid
    $api_url = "https://www.page2api.com/api/v1/scrape";
    $payload = [
    "api_key" => "0f0eaee359a056c60b2300732c13064810ca16c5",
    "real_browser" =>  true,
    "premium_proxy" =>  "us",
    "wait_for" =>  "like-button-view-model",
    "parse" =>  [
        "title" =>  "meta[name=title] >> content"
    ]
    ];
    $payload["url"] = $link;

    $postdata = json_encode($payload);
    $ch = curl_init($api_url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    $errormsg = substr($result, 2, 5);
    if($errormsg == "error"){
        header("Location: ../../main_pages/create.html?err");
        exit();
    }

    // Get country id
    $stmt -> prepare("SELECT country_id AS id FROM countries c WHERE c.country_name = ?");
    $stmt -> bind_param("s", $country);
    $stmt -> execute();
    $stmt -> bind_result($country_id);
    $stmt -> fetch();
    // $table = $country_id. "_youtube_trending_data";
    // echo $table, "<br>";

    // Get category id
    $stmt = $conn->stmt_init();
    $stmt -> prepare("SELECT category_id AS id FROM categories c WHERE c.category_name = ?");
    $stmt -> bind_param("s", $category);
    $stmt -> execute();
    $stmt -> bind_result($category_id);
    $stmt -> fetch();

    // Add video to database
    $stmt = $conn->stmt_init();
    $stmt -> prepare("INSERT INTO user_upload (video_id, title, channel_title, category_id, trending_date, view_count, country_id) VALUES (?, ?, ?, ?, current_timestamp, ?, ?)");
    $stmt -> bind_param("ssssis", $video_id, $title, $channel, $category_id, $views, $country_id);
    $stmt -> execute();

    // $duplicate_check->close();
    echo "success";
    header("Location: ../../main_pages/create.html?success");
    // header("Location: $redirect");

?>