<?php
include_once("dbconnect.php");
$name = $_GET['adminname'];
$email = $_GET['email'];
$userid = $_GET['userid'];

?>
<!DOCTYPE html>

<html>
<head>
	<style>
		th,td{
			text-align: center;
		}
	</style>
	<title>View Past Treatment</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<header>
		<nav>
			<h1>P-MANA</h1>
			<ul id="navli">
				<li><a class="homeblack" href="adminlogin.html">Logout</a></li>			
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

echo "<p><h1 align='center'>View Past Treatment</h1></p>";

		echo "<p></p>";
		echo "<p></p>";

		
		echo "<table border='1' align='center'>;

		<tr>
		<th>Medical Staff Involve</th>
        <th>Date</th>
		<th>Time</th>
        <th>Medicine Suggested</th>
        <th>Advice</th>
		<th>Action by Medical Staff</th>
        <th>Current Update</th>
        </tr>";
			
			foreach($treatment as $treatment) {
			echo "<tr>";
            echo "<td>".$treatment['medicalstaffid']."</td>";
			echo "<td>".$treatment['Date']."</td>";
			echo "<td>".$treatment['time']."</td>";
			echo "<td>".$treatment['medicine']."</td>";
			echo "<td>".$treatment['advice']."</td>";
			echo "<td>".$treatment['action']."</td>";
            echo "<td>".$treatment['actionupdate']."</td>";

    //         echo "<td><a href='msviewpatientprofile.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Patient Details</a><br>
	// <a href='msviewcurrentstatus.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Current Status</a><br>
	// <a href='mspasttreatment.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Past Treatment</a><br></td>";
	

	


            }
            echo "</table>";

?>