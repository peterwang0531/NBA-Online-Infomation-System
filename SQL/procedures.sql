-- 1. add award to RegularSeasonAward
DELIMITER |
CREATE PROCEDURE addAward(
	IN season 	VARCHAR(15),
    IN awardType VARCHAR(30),
    IN addwinner VARCHAR(30),
    IN age INT,
    IN teamAbbre VARCHAR(3),
	IN gameAttended INT)
BEGIN
	INSERT INTO RegularSeasonAward
	VALUES(season, awardType, addWinner, age, teamAbbre, gameAttended);
END |
DELIMITER ; 

-- 2. find player stats
DELIMITER |
CREATE PROCEDURE findPlayerStats(	
	IN findSeason 		int,    
	IN findPlayer 		VARCHAR(30))
BEGIN		
	SELECT *
	FROM PlayerSeasonStats	
	WHERE seasonYear = findSeason
	AND playerName = findPlayer;
END |
DELIMITER ;

-- 3. Delete Player in ThreeLeaders After some rank
DELIMITER |
CREATE PROCEDURE detelePlayerAfterRank(	
	IN  deleteRank INT)
BEGIN	
	DECLARE dPlayer	VARCHAR(30);
    DECLARE dRank INT;
    DECLARE flag	INT DEFAULT 0;
	DECLARE PlayerAfterRank CURSOR FOR
	SELECT rank, playerName
	FROM ThreePointLeaders
	WHERE rank > deleteRank;

DECLARE CONTINUE HANDLER
	FOR NOT FOUND
	SET flag = 1;
    OPEN PlayerAfterRank;

REPEAT
	FETCH PlayerAfterRank INTO dRank, dPlayer;
	IF dRank > deleteRank THEN
		DELETE FROM ThreePointLeaders
		WHERE rank = dRank AND playerName = dPlayer;
	END IF;
UNTIL flag = 1
END REPEAT;
CLOSE PlayerAfterRank;
END |
DELIMITER ;

-- 4. search player whose hits more threes than a given player
DELIMITER |
CREATE PROCEDURE findMoreThrees(	
	IN comPlayer 		VARCHAR(30))
BEGIN
	DECLARE cRank INT;
    SET cRank = (SELECT rank
				FROM ThreePointLeaders
                Where playerName = comPlayer);
	SELECT *
	FROM ThreePointLeaders	
	WHERE rank < cRank;
END |
DELIMITER ;

-- 5. find a team's largest scores in a single game
DELIMITER |
CREATE PROCEDURE findLargestScore(	
	IN searchTeamAbbre 	VARCHAR(3))
BEGIN
	SELECT MAX(teamPoints)
	FROM NBAGamesStats
    Group by teamAbbre
	Having teamAbbre = searchTeamAbbre;
END |
DELIMITER ;