<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'jhwang96';
$password = 'ooSho3jo';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
// Getting the input parameter (user):
$ID = $_REQUEST['id'];
$season = $_REQUEST['season'];
$score = trim($_REQUEST['score']);
$playerName = trim($_REQUEST['player']);

$testQuery = "Select * From Player Where playerName = '$playerName'";
$testResult = mysqli_query($dbcon,$testQuery);
if (mysqli_num_rows($testResult) == 0){
	print 'This is not a valid playerName, please correct this record!';
}

else{// Get the attributes of the user with the given username
$query = "Insert into PlayerSeasonStats(playerSeasonID, seasonYear, playerName, points) Values ($ID,$season, '$playerName',$score)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "add successfully for $playerName's stats in $season";
// Free result
}
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>