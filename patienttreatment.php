<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];

?>
<!DOCTYPE html>

	<html>
	<head>
		<title>View Treatment</title>
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeblack" href="patientmain.php?userid=<?=$userid?>&name=<?=$name?>">Daily Update</a></li>
					<li><a class="homeblack" href="historypatient.php?userid=<?=$userid?>&name=<?=$name?>">Your History</a></li>
					<li><a class="homeclick" href="patienttreatment.php?userid=<?=$userid?>&name=<?=$name?>">Treatment</a></li>
                    <li><a class="homeblack" href="managepatient.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>
					<li><a class="homeblack" href="patientlogin.html">Logout</a></li>		
					
				</ul>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 100px">
		</div>
	
</body>
</html>

<?php

$sql = "SELECT *
FROM treatment
WHERE treatment.userid = '$userid'";

$stmt = $conn->prepare($sql );
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$treatment = $stmt->fetchAll();

echo "<p><h1 align='center'>View Current Treatment</h1></p>";

		echo "<p></p>";
		echo "<p></p>";

		
		echo "<table border='1' align='center'>;

		<tr>
        <th>Date</th>
		<th>Time</th>
        <th>Medicine Suggested</th>
        <th>Advice</th>
        </tr>";
			
			foreach($treatment as $treatment) {
			echo "<tr>";
            echo "<td>".$treatment['Date']."</td>";
			echo "<td>".$treatment['time']."</td>";
			echo "<td>".$treatment['medicine']."</td>";
			echo "<td>".$treatment['advice']."</td>";

            }
            echo "</table>";

?>

