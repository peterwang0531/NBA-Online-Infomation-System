<?php

$first_name = trim($_REQUEST['first_name']);
$last_name = trim($_REQUEST['last_name']);
$full_name = trim($_REQUEST['first_name']) . " " . trim($_REQUEST['last_name']);
$email = trim($_REQUEST['email']);
$favPlayer = $_REQUEST['favPlayer'];
$favTeam = trim($_REQUEST['favTeam']);


?>

<html>
 <head>
  <link href="../../cssFile.css" rel="stylesheet" type="text/css" />
 </head>

 <body>
  <div id="header"><h1>Welcome to NBA Info System!</h1></div> 
  <div id="example">This is a initial try for sign up functionality</div>

  <div id="content">
    <p>Here's a record of the information you submitted:</p>
    <p>
      Name: <?php echo $full_name; ?><br />
      E-Mail Address: <?php echo $email; ?><br />
      Your Favorite Player: <?php echo $favPlayer; ?><br />
      Your Favorite Team: <?php echo $favTeam; ?><br />
    </p>

	<ol>
	<?php
			foreach($_REQUEST as $value) {
				echo "<li>" . $value . "</li>";
			} 
		?>
	</ol>

  </div>

  <div id="footer"></div>
 </body>
</html>