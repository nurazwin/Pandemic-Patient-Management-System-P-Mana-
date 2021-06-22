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
	<title>View Medical Staff</title>
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

	$sql = "SELECT * FROM medicalstaff";    
	$stmt = $conn->prepare($sql );
	$stmt->execute();
	// set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$medicalstaff = $stmt->fetchAll(); 

echo "<p><h1 align='center'>List of Medical Staff</h1></p>";

echo "<p></p>";
echo "<p></p>";

echo "<table border='1' align='center'>;

<tr>
<th>Medical Staff ID</th>
<th>Medical Staff Name</th>
<th>Action</th>
</tr>";
	
	foreach($medicalstaff as $medicalstaff) {
	echo "<tr>";
	echo "<td>".$medicalstaff['userid']."</td>";
	echo "<td>".$medicalstaff['name']."</td>";
	
	
	echo "<td><a href='adminviewmsdetails.php?userid=".$medicalstaff['userid']."&name=".$medicalstaff['name']."'>Medical Staff Details Details</a><br></td>";
	
	}
	echo "</table>";
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>