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
$rank = $_REQUEST['rank'];
$playerName = trim($_REQUEST['playerName']);

$query = "DELETE FROM CareerPointsLeaders WHERE rank = '$rank' AND playerName = '$playerName'";
$result = mysqli_query($dbcon, $query)
  or die('Delete failed: ' . mysqli_error($dbcon));

print "Delete successfully and ";
print "You just delete  $playerName";
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>