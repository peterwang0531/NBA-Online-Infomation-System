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
		<h1>Update Team Championships</h1>
<form method="POST" action="updateChamps.php">
  <b>Enter the Team Name you want to update(ex. Golden State Warriors)</b><BR>
  <input type="text" name="team"><BR>
  <b>Championships Number</b><BR>
  <input type="number" name="number"><BR>
  <input type="submit" value="Submit">
  <input type="reset" value="Reset">
  </form>
	</body>
</html>