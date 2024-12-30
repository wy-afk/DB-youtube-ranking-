# DB-youtube-ranking-
## Preparation
You have to have MySQL and Apache2 installed and all the datasets downloaded.
The dataset is on [Kaggle](https://www.kaggle.com/datasets/rsrishav/youtube-trending-video-dataset?resource=download&select=US_youtube_trending_data.csv), please download all the .csv files and put them in /php/database.
## Initializing the database
You can directly execute [connect.php](php/database/connect.php) to setup your database, or execute [initialize_db](php/database/initialize_db.sql) and [load_table.sql](php/database/load_table.sql) if connect doesn't work.
