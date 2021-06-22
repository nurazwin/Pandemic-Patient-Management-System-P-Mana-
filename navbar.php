<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];

?>

<!DOCTYPE html>

	<html>
	<head>
		<title>Main Page</title>
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeclick" href="patientmain.php?userid=<?php echo $userid. '&name='.$name?>">Daily Update</a></li>
                    <li><a class="homeblack" href="managepatient.php?useriod=<?php echo $userid. '&name='.$name?>">Manage</a></li>
					<li><a class="homeblack" href="#">Close Contact</a></li>
					<li><a class="homeblack" href="#">Medication</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 175px">
		</div>
    
</body>
</html>