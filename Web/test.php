<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'jhwang96';
$password = 'ooSho3jo';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';
// Getting the input parameter (user):
$season = trim($_REQUEST['season']);
$award = trim($_REQUEST['awardType']);
$winner = trim($_REQUEST['winner']);
$age = $_REQUEST['age'];

// Get the attributes of the user with the given username
$query = "Insert into RegularSeasonAward Values ('$season','$award','$winner',$age,'SDS',60)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "add successfully";
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>