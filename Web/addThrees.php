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
$rank = $_REQUEST['rank'];
$playerName = trim($_REQUEST['playerName']);
$threes = $_REQUEST['threes'];

$testQuery = "Select * From Player Where playerName = '$playerName'";
$testResult = mysqli_query($dbcon,$testQuery);
if (mysqli_num_rows($testResult) == 0){
	print 'This is not a valid playerName, please correct this record!';
}

else{// Get the attributes of the user with the given username
$query = "Insert into ThreePointLeaders Values ($rank,'$playerName',$threes)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "add successfully for this new threes record";
// Free result
}
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>