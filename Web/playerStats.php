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
$playerName = trim($_REQUEST['playerName']);
// Get the attributes of the user with the given username
$query = "SELECT seasonYear, games, totalReb, assists, points FROM PlayerSeasonStats WHERE playerName = '$playerName'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

$numRows = mysqli_num_rows($result);
if($numRows != 0){
	print "Stats of Player <b>$playerName</b> by season:";
// Printing user attributes in HTML
	print '<ul>';
	while ($tuple = mysqli_fetch_row($result)) {
   		print "<li> Season :$tuple[0], Game Attended :$tuple[1], Rebounds :$tuple[2], Assists :$tuple[3], Points :$tuple[4]";
	}
	print '</ul>';
}

else{
	print "Sorry, this is not a NBA player";
}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>