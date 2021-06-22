<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
$userid = $_GET['userid']; 
$name = $_GET['name'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Patient | PPMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<header>
		<nav>
			<h1>P-MANA</h1>	
				<ul id="navli">
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
</html>
<?php

$sql = "SELECT *
FROM patient
WHERE patient.userid = '$userid'";

$stmt = $conn->prepare($sql );
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$patient = $stmt->fetchAll();

echo "<p><h1 align='center'>Profile Patient</h1></p>";

echo "<table border='1' align='center'>";

 foreach($patient as $patient) {
    echo "<tr><td>Patient Name</td><td>".$patient['name']."</td></tr>";
    echo "<tr><td>Email</td><td>".$patient['email']."</td></tr>";
    echo "<tr><td>Phone Number</td><td>".$patient['phoneNo']."</td></tr>";
    echo "<tr><td>Address</td><td>".$patient['address']."</td></tr>";
	echo "<tr><td>Close Contact</td><td>".$patient['closecontact']."</td></tr>";
	echo "<tr><td>Dieses History</td><td>".$patient['dieseshistory']."</td></tr>";
	echo "<tr><td>Date Register</td><td>".$patient['RegisterDate']."</td></tr>";
 }
 	echo "</table><br>";
 
?>

