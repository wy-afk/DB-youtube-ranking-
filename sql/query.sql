SELECT DISTINCT title, video_id, thumbnail_link, published_at, likes, MAX(view_count)AS view_count
FROM (
    SELECT DISTINCT d.title, d.channel_title, d.video_id, d.thumbnail_link, d.published_at, d.likes, d.view_count
    FROM US_youtube_trending_data AS d
    WHERE d.category_id = 10
    UNION
    SELECT DISTINCT u.title, u.channel_title, u.video_id, u.thumbnail_link, u.published_at, u.likes, u.view_count
    FROM user_upload AS u
    WHERE u.category_id = 10 AND u.country_id = "US"
) AS agg
GROUP BY title, video_id, thumbnail_link, published_at, likes
ORDER BY view_count DESC
LIMIT 30;

