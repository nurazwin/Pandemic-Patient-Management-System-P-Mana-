<?php
session_start();
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name']; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Medical Staff Profile | PPMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<header>
		<nav>
			<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeblack" href="msmain.php?userid=<?=$userid?>&name=<?=$name?>">List Patient</a></li>
					<li><a class="homeblack" href="patientregisterhtml.php?userid=<?=$userid?>&name=<?=$name?>">Add Patient</a></li>
                    <li><a class="homeclick" href="msprofile.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>	
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
   
	try {
		$sql = "SELECT * FROM medicalstaff WHERE userid = '$userid' ";  
			$stmt = $conn->prepare($sql );
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $medicalstaff = $stmt->fetchAll(); 
    

		echo "<p><h1 align='center'>Medical Staff Profile</h1></p>";

		echo "<p></p>";
		echo "<p></p>";

		echo "<table border='1' align='center'>";

		foreach($medicalstaff as $medicalstaff) {
			echo "<tr><td>Medical Number</td><td>".$medicalstaff['userid']."</td></tr>";
			echo "<tr><td>Full name</td><td>".$medicalstaff['name']."</td></tr>";
			echo "<tr><td>Email</td><td>".$medicalstaff['email']."</td></tr>";
			echo "<tr><td>Phone Number</td><td>".$medicalstaff['phoneno']."</td></tr>";


			echo "</table><br>";
      echo "<p align='center'><a href='updatemsprofile.php?userid=".$userid."&name=".$name."&email=".$medicalstaff['email']."&phoneno=".$medicalstaff['phoneno']."&medicalno=".$medicalstaff['medicalno']. "'><i class='fas fa-edit' style='font-size:22px'></i></a></p>";
      
     

		}

		
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		
?>