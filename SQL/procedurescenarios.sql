-- 1, test procedure addAward
-- this is what it's look like before changes, only MVP's
SELECT DISTINCT awardType
FROM RegularSeasonAward;
-- call procesure
CALL addAward('2017', 'Defensive Player of the Year', 'Draymond Green', 27, 'GSW', 80);
-- now there is DPOY added
SELECT DISTINCT awardType
FROM RegularSeasonAward;

-- 2. find Carmelo Anthony's stats in 2016
Call findPlayerStats(2016, 'Carmelo Anthony');

-- 3. delete all player whose rank is lower than 100
-- this is what's like before modification 133 Players + a test player
Select *
From ThreePointLeaders;

-- delete rank after 100
Call detelePlayerAfterRank(100);

-- only top 100 player exist now in this table
Select *
From ThreePointLeaders;

-- 4. find players who hits more threes than Jason Kidd
CALL findMoreThrees('Jason Kidd');

-- 5. find a team's largest score of GSW, LAL, BOS
CALL findLargestScore('GSW');
CALL findLargestScore('LAL');
CALL findLargestScore('BOS')

