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
$team = trim($_REQUEST['team']);
$number = trim($_REQUEST['number']);


$testQuery = "Select * From Team Where teamName = '$team'";
$testResult = mysqli_query($dbcon,$testQuery);
if (mysqli_num_rows($testResult) == 0){
	print 'This is not a valid team, please correct this record!';
}

else{// Get the attributes of the user with the given username
$query = "Update Team Set championships = $number Where teamName = '$team'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "update successfully to $team's championships";
// Free result
}
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>