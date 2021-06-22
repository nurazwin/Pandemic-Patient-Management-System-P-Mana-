<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Current Status | PPMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<header>
		<nav>
		<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeblack" href="msmanagetreatment.php?userid=<?=$userid?>&name=<?=$name?>">Manage Treatment</a></li>
					<li><a class="homeblack" href="mslogin.html">Logout</a></li>	
					
				</ul>
			</nav>
		</header>
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 100px">
		</div>

</html>
<?php

$sql = "SELECT *
FROM healthpatient
WHERE healthpatient.userid = '$userid'";

$stmt = $conn->prepare($sql );
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$healthpatient = $stmt->fetchAll();

echo "<p><h1 align='center'>Current Status Health</h1></p>";

echo "<h1> Patient Mr / Mrs, $name</h1>";

		echo "<p></p>";
		echo "<p></p>";

		
		echo "<table border='1' align='center'>;

		<tr>
        <th>Date</th>
		<th>Time</th>
        <th>Temperature</th>
        <th>Behaviour</th>
        <th>Symptom</th>
        <th>Medication</th>
		<th>Risk Level</th>
        </tr>";
			
			foreach($healthpatient as $healthpatient) {
			echo "<tr>";
            echo "<td>".$healthpatient['date']."</td>";
			echo "<td>".$healthpatient['time']."</td>";
			echo "<td>".$healthpatient['temperature']."</td>";
			echo "<td>".$healthpatient['behaviour']."</td>";
            echo "<td>".$healthpatient['symptom']."</td>";
            echo "<td>".$healthpatient['medication']."</td>";
			echo "<td>".$healthpatient['risklevel']."</td>";

            }
            echo "</table>";

            //echo "<p align='center'><a href='msmanagetreatment.php?userid=".$userid."&name=".$name."'>Manage Treatement</a></p>";

?>