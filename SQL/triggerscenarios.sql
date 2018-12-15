-- #1. TEST OF TRIGGER ONE

-- test the first trigger, ie, ThreePointerCheckInsertTrigger
-- A. the case where trigger activate, ie, threes < 800 and block this insert, throwing and error and nothing happens
-- to show the work, I first show the table of ThreePointerLeaders before modifications and total number of rows
-- the table is:
Select *
From ThreePointLeaders;
-- number of row is:
Select Count(*)
From ThreePointLeaders;
-- then we do a wrong insert to let trigger fire
-- we should expect and error will be thrown after execute the following code
Insert Into ThreePointLeaders
Values (1, 'Peter Wang', 600);

-- We can see by Table ThreePointLeaders and its number of rows remains the same （132 rows）after this wrong insertion
-- so we can show the trigger activated
Select *
From ThreePointLeaders;

Select Count(*)
From ThreePointLeaders;

-- B. Not Activate the trigger:

-- we can simply insert another data with points larger than 800 so that the trigger will not fire by the if clause
Insert Into ThreePointLeaders
Values(10000,'Peter Wang',900);
-- We can see the table changes and row increases by 1 to 133
select *
From ThreePointLeaders;

select count(*)
from ThreePointLeaders;
-- -------------------------------------------------------------------------------------------------------

-- #2. TEST OF TRIGGER TWO
-- A. activate the trigger
-- test the log trigger, because only if points are updated by growing 30 or more points the trigger will fire, so let's make that change
-- we first show the table CareerPointsChanges before modified

SELECT *
From CareerPointsChanges;
-- it's empty, and then we make change
UPDATE CareerPointsLeaders
SET points = points + 40
WHERE playerName = 'Dwyane Wade'
And Rank = 30;
-- after the change we should expect the log has DWade's update, we can show this by the updated log
Select *
From CareerPointsChanges;
-- this is the same with above
UPDATE CareerPointsLeaders
SET points = points + 40
WHERE playerName = 'Chris Paul'
And Rank < 300;
-- so we should expect the CareerPointsChanges log has CP and DW's changes
Select *
From CareerPointsChanges;

-- B. NOT ACTIVATE THE TRIGGER:
-- we can change points less than 30, or we just insert data because the trigger is activated by update
UPDATE CareerPointsLeaders
Set points = points + 1
Where playerName = 'Lebron James'
And Rank < 300;

-- nothing changes in the log
select *
from CareerPointsChanges;

-- insert move
Insert Into CareerPointsLeaders
Values (10000,'Peter Wang', 12321);
-- we can see change in the leader board, has my name at the bottom
select *
From CareerPointsLeaders;
-- But nothing happens in the log, still 2 updates records for DW and CP
SELECT *
From CareerPointsChanges;

-- --------------------------------------------------------------------------------

-- #3. TEST OF TRIGGER 3
-- A. activate the trigger, e.g., I try to decrease Lebron's scores by 40
-- this is his points before change:
Select points
From CareerPointsLeaders
Where playerName = 'LeBron James';
-- it's 31577

UPdate CareerPointsLeaders
Set points = points - 40
Where playerName = 'LeBron James'
And Rank < 100;

-- because the trigger fires to maintain the score, so the score is still 31577
Select points
From CareerPointsLeaders
Where playerName = 'Lebron James'; 

-- B. NOT ACTIVATE THE TRIGGER
-- but the trigger won't forbid the try to increase points
-- see Kevin Durants original scores
Select points
From CareerPointsLeaders
Where playerName = 'Kevin Durant';
-- it's 21506

-- because he scored 49 tonight, so I increase this points
UPDATE CareerPointsLeaders
Set points = points + 49
Where playerName = 'Kevin Durant'
And Rank < 100;

-- And we can see the points is now 21555, greater by 49
Select points
From CareerPointsLeaders
Where playerName = 'Kevin Durant';