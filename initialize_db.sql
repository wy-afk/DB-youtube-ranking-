CREATE DATABASE youtube_trending_video;
use youtube_trending_video;

CREATE TABLE countries(
    name VARCHAR(50),
    country_id VARCHAR(2),
    PRIMARY KEY (country_id)
);

CREATE TABLE categories(
    name VARCHAR(50),
    category_id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (category_id)
);

CREATE TABLE BR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE CA_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE DE_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE FR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE JP_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE GB_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE IN_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE KR_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE MX_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE RU_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE US_youtube_trending_data (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE user_upload (
    video_id VARCHAR(200),
    title TEXT,
    published_at TIMESTAMP,
    channel_id VARCHAR(200),
    channel_title VARCHAR(200),
    category_id INT,
    trending_date TIMESTAMP,
    tags TEXT,
    view_count INT,
    likes INT,
    dislikes INT,
    comment_count INT,
    thumbnail_link TEXT,
    comments_disabled BOOLEAN,
    ratings_disabled BOOLEAN,
    description TEXT,
    country_id VARCHAR(2),
    PRIMARY KEY (video_id, trending_date),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE user(
    username VARCHAR(200),
    user_id int NOT NULL AUTO_INCREMENT,
    user_password VARCHAR(100),
    PRIMARY KEY (user_id)
);

-- add admin
INSERT INTO user (username, user_password)
VALUES('admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

-- initialize countries table
INSERT INTO countries (name, country_id)
VALUES ('United States', 'US'),
('Brazil', 'BR'),
('Canada', 'CA'),
('Germany', 'DE'),
('France', 'FR'),
('Great Britain', 'GB'),
('India', 'IN'),
('Japan', 'JP'),
('Mexico', 'MX'),
('Russia', 'RU'),
('Korea', 'KR');

-- initialize categories table
INSERT INTO categories (name, category_id)
VALUES ('Howto & Style', 26),
('Music', 10),
('Film & Animation', 1),
('Autos & Vehicles', 2),
('Pets & Animals', 15),
('Sports', 17),
('Short Movies', 18),
('Travel & Events', 19),
('Gaming', 20),
('Videoblogging', 21),
('People & Blogs', 22),
('Comedy', 23),
('Entertainment', 24),
('News & Politics', 25),
('Education', 27),
('Science & Technology', 28),
('Movies', 30),
('Anime/Animation', 31),
('Classics', 33),
('Comedy', 34),
('Documentary', 35),
('Drama', 36),
('Family', 37),
('Foreign', 38),
('Horror', 39),
('Sci-Fi/Fantasy', 40),
('Thriller', 41),
('Shorts', 42),
('Shows', 43),
('Trailers', 44),
('Nonprofits & Activism', 29),
('Action/Adventure', 32);

SET global local_infile=true;
-- now open mysql with sudo mysql --local_infile=1 -u root -p