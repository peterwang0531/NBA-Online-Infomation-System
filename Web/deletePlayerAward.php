<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'jhwang96';
$password = 'ooSho3jo';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

mysqli_select_db($dbcon, $database)
   or die('Could not select database');
// Getting the input parameter (user):
$season = trim($_REQUEST['season']);
$award = trim($_REQUEST['awardType']);
$winner = trim($_REQUEST['winner']);

$query = "DELETE FROM RegularSeasonAward WHERE season = '$season' AND awardType = '$award'";
$result = mysqli_query($dbcon, $query)
  or die('Delete failed: ' . mysqli_error($dbcon));

print "Delete successfully and ";
print "You just delete $season $award $winner";
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>