<?php
$stmt = $conn->stmt_init();

// Search term input
$term = $_POST["search-term"];

// TODO: Replace __sql__ with the SQL command
$sql = "SET @key = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $term);

$stmt->execute();

$sql = "SELECT DISTINCT title, channel_title, MAX(view_count)
        FROM
        (
            SELECT DISTINCT title AS title, channel_title AS channel_title, view_count AS view_count
            FROM BR_youtube_trending_data AS BR
            WHERE BR.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT CA.title, CA.channel_title, CA.view_count
            FROM CA_youtube_trending_data AS CA
            WHERE CA.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT DE.title, DE.channel_title, DE.view_count
            FROM DE_youtube_trending_data AS DE
            WHERE DE.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT FR.title, FR.channel_title, FR.view_count
            FROM FR_youtube_trending_data AS FR
            WHERE FR.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT GB.title, GB.channel_title, GB.view_count
            FROM GB_youtube_trending_data AS GB
            WHERE GB.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT US.title, US.channel_title, US.view_count
            FROM US_youtube_trending_data AS US
            WHERE US.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT RU.title, RU.channel_title, RU.view_count
            FROM RU_youtube_trending_data AS RU
            WHERE RU.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT MX.title, MX.channel_title, MX.view_count
            FROM MX_youtube_trending_data AS MX
            WHERE MX.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT JP.title, JP.channel_title, JP.view_count
            FROM JP_youtube_trending_data AS JP
            WHERE JP.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT KR.title, KR.channel_title, KR.view_count
            FROM KR_youtube_trending_data AS KR
            WHERE KR.title LIKE CONCAT('%', @key, '%')
            UNION
            SELECT DISTINCT title AS title, channel_title AS channel_title, view_count
            FROM IN_youtube_trending_data AS IND
            WHERE IND.title LIKE CONCAT('%', @key, '%')
        ) AS agg
        GROUP BY title, channel_title
        ORDER BY MAX(view_count) DESC
        LIMIT 100";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $term);

$stmt->execute();

// NOTE: video_result should be an array that looks like vector< map<string, [data_type]> >
$result = $stmt->get_result();
if(!$result){
    echo "Query Failed.<br>";
    exit();
}

$videos = $result->fetch_all(MYSQLI_ASSOC);

// TODO: further process of the fetched data.

$result->close();
exit();
?>