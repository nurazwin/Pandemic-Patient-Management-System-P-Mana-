<?php
include_once("dbconnect.php");
$name = $_GET['adminname'];
$email = $_GET['email'];

?>

<!DOCTYPE html>

<html>
<head>
	<style>
		th,td{
			text-align: center;
		}
	</style>
	<title>View List Patient</title>
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

try {

	$sql = "SELECT * FROM patient";    
	$stmt = $conn->prepare($sql );
	$stmt->execute();
	// set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$patient = $stmt->fetchAll(); 

echo "<p><h1 align='center'>List of Patient</h1></p>";

echo "<p></p>";
echo "<p></p>";

echo "<table border='1' align='center'>;

<tr>
<th>Patient ID</th>
<th>Patient Name</th>
<th>Action</th>
</tr>";
	
	foreach($patient as $patient) {
	echo "<tr>";
	echo "<td>".$patient['userid']."</td>";
	echo "<td>".$patient['name']."</td>";
	
	//<a href='deleteProject.php?adminID=".$adminID."&file_id=".$project['id']."'
	
	echo "<td><a href='msviewpatientprofile.php?adminname=".$name."&email=".$email."&userid=".$patient['userid']."&name=".$patient['name']."'>Patient Details</a><br>
	<a href='msviewcurrentstatus.php?adminname=".$name."&email=".$email."&userid=".$patient['userid']."&name=".$patient['name']."'>Current Status</a><br>
	<a href='adminpasttreatment.php?adminname=".$name."&email=".$email."&userid=".$patient['userid']."'>Past Treatment</a><br></td>";
	
	}
	echo "</table>";

} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>