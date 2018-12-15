<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'jhwang96';
$password = 'ooSho3jo';
$database = $username.'DB';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Selecting a database
//   Unnecessary in this case because we have already selected 
//   the right database with the connect statement.  
mysqli_select_db($dbcon, $database)
   or die('Could not select database');

// Listing tables in your database
$query = 'Select season, awardType, winner From RegularSeasonAward';
$result = mysqli_query($dbcon, $query)
  or die('Show tables failed: ' . mysqli_error());



// Closing connection
mysqli_close($dbcon);
?> 

<!DOCTYPE html>
<!-- This is a template. I get this template from the example project, fishing trip to help the design of my page. All php code is written by myself-->

<html>

  <head>
    <meta content="charset=utf-8" />
    <title>NBA Info System</title>
	<link rel="stylesheet" href="./style.css">
  </head>

	<body>

		<nav>
	<ul>
	   <li><a href="./index.html">Home</a></li>
	   <li><a href="./Awards.php">Regular Season Award</a></li>
	   <li><a href="./AddAward.html">Add Player Award</a></li>
	   <li><a href="./Team.php">Team</a></li>
	   <li><a href="./UpdateTeam.php">Update Team Information</a></li>
	   <li><a href="./searchPlayerInfo.html">Players</a></li><li>
	   <li><a href="./DeletePlayer.php">Delete Information of a player</a></li>
	   <li><a href="./searchPlayerStats.html">Player Stats</a></li>
	   <li><a href="./addPlayerStats.php">Add Player Stats</a></li>
	   <li><a href="./CareerPointsLeader.php">Career Points Leader Board</a></li>
	   <li><a href="./ThreePointerLeader.php">Three Pointer Leader Board</a></li>
	   <li><a href="./DataWareHouse.php">Data WareHouse</a></li>
	</ul>
</nav>
		<h1>Regular Season Awards of all time</h1>

<table>
	<tr>
		<th>Delete</th>
    	<th>Season</th>
    	<th>Award</th>
    	<th>Winner</th>
  	</tr>
<?php
while ($tuple = mysqli_fetch_row($result)) {
   print '<form action = "deletePlayerAward.php" method = "POST">';
   print '<tr>';
   print '<td>';
   print '<input type="submit" value="DELETE"/>' . '<input type="hidden" name="season" ' . ' value="' . $tuple[0] . '"/>';
   print '<input type="hidden" name="awardType" ' . ' value="' . $tuple[1] . '"/>';
   print '<input type="hidden" name="winner" ' . ' value="' . $tuple[2] . '"/>';
   print '</td>';
   print "<td>$tuple[0]</td>";
   print "<td>$tuple[1]</td>";
   print "<td>$tuple[2]</td>";
   print '</tr>';
   print "</form>";
}

?>
</table>	
	</body>
</html>