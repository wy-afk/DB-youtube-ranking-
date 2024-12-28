CREATE DATABASE youtube_trending_video;
use youtube_trending_video;

CREATE TABLE BR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE CA_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE DE_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE FR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE JP_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE GB_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE IN_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE KR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE MX_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE RU_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE US_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE user_upload (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id TEXT,
    channel_title TEXT,
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOL,
    ratings_disabled BOOL,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id)
);

CREATE TABLE countries(
    name TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (country_id)
);

CREATE TABLE categories(
    name text,
    category_id VARCHAR(2),
    PRIMARY KEY (name)
);

CREATE TABLE user(
    username text,
    user_id int,
    user_password text,
    PRIMARY KEY (user_id)
);

SET global local_infile=true;
-- now open mysql with sudo mysql --local_infile=1 -u root