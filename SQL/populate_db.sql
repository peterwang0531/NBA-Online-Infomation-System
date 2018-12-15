LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\team.csv' INTO TABLE Team
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\CareerPointsLeader.csv' INTO TABLE CareerPointsLeaders
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\nba.games.stats.csv' INTO TABLE NBAGamesStats
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\Players.csv' INTO TABLE Player
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\PlayerStatsBySeason.csv' INTO TABLE PlayerSeasonStats
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\RegularSeasonAward.csv' INTO TABLE RegularSeasonAward
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:\\Users\\APPLE1\\Desktop\\UChicago\\Databases\\hw7\\data\\ThreePointLeader.csv' INTO TABLE ThreePointLeaders
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;