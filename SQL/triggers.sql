-- 1. attributes constraints trigger: because a player on the three pointer Leader Board must hits more than 800 threes or he is not qualified.
-- so I use trigger to force all inserting tuples' values of the attribute 'threes' must be > 800, if not the insert is blocked and an error will be thrown

DELIMITER |
CREATE TRIGGER ThreePointerCheckInsertTrigger
BEFORE INSERT ON ThreePointLeaders
FOR EACH ROW
	BEGIN
		IF (NEW.threes < 800) THEN
			SET NEW.Rank = NULL;   -- Rank can never be null, so it blocks wrong insert
		END IF;
END; | 
DELIMITER ;


-- 2. Because some active players like LeBron and KD are on ALL time CareerPointsLeader Board and their pointes will change frequently, so I create a table
-- called CareerPointsChanges to be as a log for the update to the table of CareerPointsLeaders, but only track we points grow more than 30
 
DELIMITER |
CREATE Trigger PointsChangesTrigger
AFTER UPDATE ON CareerPointsLeaders
FOR EACH ROW
BEGIN
	IF (NEW.points > OLD.points + 30) THEN
		INSERT IGNORE INTO CareerPointsChanges (oldPlayerName, oldPoints, newPoints, userMakingChange, dateChanged)
        VALUES(OLD.playerName, OLD.points, NEW.points, CURRENT_USER(), NOW());
	END IF;
END; |
DELIMITER ;

-- 3. when some updates try to decrease a players' career points, we deny it by set it to origin value
DELIMITER |
CREATE TRIGGER DecreaseScoreTrigger
BEFORE UPDATE ON CareerPointsLeaders
FOR EACH ROW	
	BEGIN		
		IF (New.points < OLD.points) THEN
			SET NEW.points = OLD.points;
		END IF;
END; |
DELIMITER ;
