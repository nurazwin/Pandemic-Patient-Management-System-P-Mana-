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
	<title>Main Page</title>
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

echo "<p><h1 align='center'>Welcome to Pandemic Patient Management System, $name</h1></p>";

echo "<p></p>";
echo "<p></p>";

echo "<table border='1' align='center'>;

<tr>
<th>Menu</th>
</tr>";
	
	
	echo "<tr>";
	
	echo "<tr><td><a href='adminviewpatient.php?adminname=".$name."&email=".$email."'align='center'>About Patient</a></td></tr>";
	echo "<tr><td><a href='adminviewms.php?adminname=".$name."&email=".$email."'align='center'>About Medical Staff</a></td></tr>";
	echo "<tr><td><a href='msregisterhtml.php?adminname=".$name."&email=".$email."'align='center'>Add Medical Staff</a></td></tr>";	
	echo "</table>";


} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
