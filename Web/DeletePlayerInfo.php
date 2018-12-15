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
$playerName = trim($_REQUEST['name']);


$testQuery = "Select * From Player Where playerName = '$playerName'";
$testResult = mysqli_query($dbcon,$testQuery);
if (mysqli_num_rows($testResult) == 0){
	print 'This is not a valid player Name, please correct this record!';
}

else{// Get the attributes of the user with the given username
$getID = "select playerID From Player Where playerName = '$playerName'";
$aId = mysqli_query($dbcon,$getID);
$tuple = mysqli_fetch_row($aId);
$ID = $tuple[0];
$query = "Delete From Player Where playerID = $ID";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "delete successfully";
// Free result
}
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>