SELECT DISTINCT d.title as title, d.channel_title as channel, MAX(d.view_count) as view_count
FROM US_youtube_trending_data as d -- 改這裡
WHERE category_id IN (
    SELECT c.category_id AS id
    FROM categories AS c
    WHERE STRCMP(c.name, 'People & Blogs') = 0 -- 改這裡
)
GROUP BY title, channel
ORDER BY view_count DESC
LIMIT 100;