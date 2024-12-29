SET @cat_id = (
    SELECT c.category_id AS id
    FROM categories AS c
    WHERE STRCMP(c.category_name, 'People & Blogs') = 0 -- 改這裡
);

SELECT DISTINCT title, channel_title, MAX(view_count)
FROM (
    SELECT DISTINCT d.title, d.channel_title, d.view_count
    FROM US_youtube_trending_data as d -- 改這裡
    WHERE d.category_id = @cat_id
    UNION
    SELECT DISTINCT u.title as title, u.channel_title, u.view_count
    FROM user_upload as u
    WHERE u.category_id = @cat_id AND u.country_id = "US"
) AS agg
GROUP BY title, channel_title
ORDER BY MAX(view_count) DESC
LIMIT 100;