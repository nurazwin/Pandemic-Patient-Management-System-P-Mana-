<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
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
					<li><a class="homeclick" href="mstmain.php?userid=<?=$userid?>&name=<?=$name?>">List Patient</a></li>
					<li><a class="homeblack" href="patientregisterhtml.php?userid=<?=$userid?>&name=<?=$name?>">Add Patient</a></li>
                    <li><a class="homeblack" href="msprofile.php?userid=<?=$userid?>&name=<?=$name?>">Your Profile</a></li>	
					<li><a class="homeblack" href="mslogin.html">Logout</a></li>			
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

//delete operation
if (isset($_GET['action'])) {
	$id = $_GET['userid'];
	try {
	  $sql = "DELETE FROM patient WHERE userid='$userid'";
	  $conn->exec($sql);
	  echo "<script> alert('Delete Success')</script>";
	} catch(PDOException $e) {
	  echo "<script> alert('Delete Error')</script>";
	}
  }

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
<th>View</th>
<th>Action</th>
</tr>";
	
	foreach($patient as $patient) {
	echo "<tr>";
	echo "<td>".$patient['userid']."</td>";
	echo "<td>".$patient['name']."</td>";
	
	echo "<td><a href='msviewpatientprofile.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Patient Details</a><br>
	<a href='msviewcurrentstatus.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Current Status</a><br>
	<a href='mspasttreatment.php?userid=".$userid."&name=".$name."&userid=".$patient['userid']."&name=".$patient['name']."'>Past Treatment</a><br></td>";

	echo "<td><a href='historypatient.php?userid=".$userid."&name=".$name."&id=".$patient['userid']."&action=del' onclick= 'return confirm(\"Delete. Are your sure?\");'><i class='fas fa-trash' style='font-size:22px'></i></a></td>";
	

	// echo "<td><a href='historypatient.php?userid=".$userid."&name=".$name."&id=".$healthpatient['id']."&action=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
	// 		<a href='updatehealth.php?userid=".$userid."&name=".$name."&id=".$healthpatient['id']."&temperature=".$healthpatient['temperature'].
    //         "&behaviour=".$healthpatient['behaviour']."&symptom=".$healthpatient['symptom']."&medication=".$healthpatient['medication']."&date=".$healthpatient['date']." '>Update</a></td>";
	}
	echo "</table>";

} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
