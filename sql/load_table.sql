use youtube_trending_video;

LOAD DATA LOCAL INFILE 'BR_youtube_trending_data.csv'
INTO TABLE BR_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'CA_youtube_trending_data.csv'
INTO TABLE CA_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'DE_youtube_trending_data.csv'
INTO TABLE DE_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'FR_youtube_trending_data.csv'
INTO TABLE FR_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'GB_youtube_trending_data.csv'
INTO TABLE GB_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'IN_youtube_trending_data.csv'
INTO TABLE IN_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'JP_youtube_trending_data.csv'
INTO TABLE JP_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'KR_youtube_trending_data.csv'
INTO TABLE KR_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'MX_youtube_trending_data.csv'
INTO TABLE MX_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'RU_youtube_trending_data.csv'
INTO TABLE RU_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'US_youtube_trending_data.csv'
INTO TABLE US_youtube_trending_data
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 ROWS;

UPDATE BR_youtube_trending_data
SET country_id = 'BR';

UPDATE DE_youtube_trending_data
SET country_id = 'DE';

UPDATE CA_youtube_trending_data
SET country_id = 'CA';

UPDATE FR_youtube_trending_data
SET country_id = 'FR';

UPDATE GB_youtube_trending_data
SET country_id = 'GB';

UPDATE IN_youtube_trending_data
SET country_id = 'IN';

UPDATE JP_youtube_trending_data
SET country_id = 'JP';

UPDATE KR_youtube_trending_data
SET country_id = 'KR';

UPDATE MX_youtube_trending_data
SET country_id = 'MX';

UPDATE RU_youtube_trending_data
SET country_id = 'RU';

UPDATE US_youtube_trending_data
SET country_id = 'US';