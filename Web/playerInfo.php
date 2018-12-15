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
$player = $_REQUEST['player'];

// Get the attributes of the user with the given username
$query = "SELECT playerName, height, weight, college FROM Player WHERE playerName = '$player'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result

if(mysqli_num_rows($result) == 0){
	print 'this is not a player Name, please try again';
}
else{
	print "Player <b>$player</b> has the following attributes:";
$tuple = mysqli_fetch_row($result)
  or die("Player $player not found!");
// Printing user attributes in HTML
print '<ul>';  
print '<li> Player Name: '.$tuple[0];
print '<li> Height: '.$tuple[1];
print '<li> Weight: '.$tuple[2];
print '<li> College: '.$tuple[3];
print '</ul>';
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 