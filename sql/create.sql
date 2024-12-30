SET @country = "United States";

-- Find country id
SELECT country_id AS cid
FROM countries
WHERE STRCMP(name, @country) = 0;

-- Find category id
SELECT category_id AS id FROM categories c WHERE c.name = "Music";

-- Add new video
INSERT INTO user_upload (video_id, title, channel_title, category_id, trending_date, view_count)
VALUES (?, ?, ?, ?, current_timestamp, ?);