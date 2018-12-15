CREATE TABLE Team (
	teamName varchar(30),
    Abbre varchar(3),
    foundedYear int,
    games int,
    wins int,
    losses int,
    winLossRatio float,
    yearsOfPlayoffs int,
    divisionTitle int,
    confChamp int,
    championships int,
    PRIMARY KEY (teamName)
);
CREATE TABLE Player (
	playerID int,
	playerName varchar(30),
    height Float,
    weight FLOAT,
    college varchar(50) default null,
	birthYear int Default 0,
    birthCity varchar(30) Default Null,
    birthState varchar(30) default Null,
    PRIMARY KEY (playerID)
    );

Create Table PlayerSeasonStats (
	playerSeasonID int,
    seasonYear int,
	playerName varchar(30),
    age int,
    teamAbbre varchar(3),
	games int,
    offensiveReb int Default 0,
	defensiveReb int Default 0,
    totalReb int Default 0,
    assists int Default 0,
    steals int Default 0,
    blocks int Default 0,
    turnovers int default 0,
    playerFouls int default 0,
    points int default 0,
    Primary Key (playerSeasonID)
    );

Create table NBAGamesStats (
	gameID int,
    teamAbbre varchar(3),
    gameNumber int,
    gameDate Date,
    home varchar(4),
    opponentAbbre varchar(3),
    winOrLoss varchar(1),
    teamPoints int,
    opponentPoints int,
    Primary Key (gameID)
);

 CREATE TABLE Season (
	SeasonYear Varchar(15),
    gamesNumber int,
    PRIMARY KEY (SeasonYear)
    );

CREATE TABLE Playin (
	Playername Varchar(30),
    SeasonYear Varchar(15),
    PRIMARY KEY (Playername, SeasonYear)
    );

CREATE TABLE TeamRecord (
	RecordName varchar(50),
    details varchar(50),
    team varchar(30),
    Primary key (RecordName)
    );

CREATE TABLE CareerRecord (
	RecordName varchar(50),
    detail varchar(50),
    holder varchar(30),
    primary key (RecordName)
    );

CREATE TABLE SingleSeasonRecord(
	RecordName varchar(50),
    detail varchar(50),
    holder varchar(30),
    season varchar(15),
    primary key (RecordName)
    );

CREATE TABLE GameRecord(
	RecordName varchar(50),
    detail varchar(50),
    holder varchar(30),
    gameInfo varchar(50),
    primary key (RecordName)
    );

CREATE TABLE RegularSeasonAward (
    season varchar(15),
    awardType varchar(30),
    winner varchar(30),
    age int,
    teamAbbre varchar(3),
    gameAttended int,
    Primary key (season, awardType)
    );

CREATE TABLE ThreePointLeaders (
	Rank int,
    playerName varchar(30),
    threes int,
    primary key (Rank, playername)
    );

CREATE TABLE CareerPointsLeaders (
	Rank int,
    playerName varchar(30),
    points int,
    primary key (Rank, playername)
    );

CREATE TABLE CareerPointsChanges (
playerPointsChangesID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
oldPlayerName varchar(30),
oldPoints int,
newPoints int,
userMakingChange varchar(50),
dateChanged datetime);

    



