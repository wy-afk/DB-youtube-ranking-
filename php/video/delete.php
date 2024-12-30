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

    // Check if link is from youtube
    $youtube = substr($link, 12, 7);
    if($youtube != "youtube"){
        header("Location: ../../main_pages/delete.html?err=notyt");
        exit();
    }

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

    $errmsg = substr($result, 2, 5);
    if($errmsg != "error"){
        header("Location: ../../main_pages/delete.html?err=invalidlink");
        exit();
    }

    // Get category id
    $stmt = $conn->stmt_init();
    $stmt -> prepare("SELECT category_id AS id FROM categories c WHERE c.category_name = ?");
    $stmt -> bind_param("s", $category);
    $stmt -> execute();
    $stmt -> bind_result($category_id);
    $stmt -> fetch();

    // Delete videos from database
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM user_upload WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM BR_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM CA_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM DE_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM FR_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM GB_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM IN_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM JP_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM KR_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM MX_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM RU_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();
    $stmt = $conn->stmt_init();
    $stmt -> prepare("DELETE FROM US_youtube_trending_data WHERE video_id = ? AND title = ? AND category_id = ?");
    $stmt -> bind_param("sss", $video_id, $title, $category_id);
    $stmt -> execute();

    header("Location: ../../main_pages/delete.html?success");

?>