<?php
session_start();
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name']; 
 ?>
<!DOCTYPE html>

<html>
<head>
	<title>Profile Patient</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
				<ul id="navli">
				    <li><a class="homeblack" href="patientmain.php?userid=<?=$userid?>&name=<?=$name?>">Daily Update</a></li>
					<li><a class="homeblack" href="historypatient.php?userid=<?=$userid?>&name=<?=$name?>">Your History</a></li>
					<li><a class="homeblack" href="patienttreatment.php?userid=<?=$userid?>&name=<?=$name?>">Treatment</a></li>
                    <li><a class="homeclick" href="managepatient.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>
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
   
	try {
			$sql = "SELECT * FROM patient WHERE userid = '$userid' ";    
			$stmt = $conn->prepare($sql );
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $patient = $stmt->fetchAll(); 
		echo "<p><h1 align='center'>Patient Profile</h1></p>";

		echo "<p></p>";
		echo "<p></p>";

		echo "<table border='1' align='center'>";

		foreach($patient as $patient) {
	  echo "<tr><td>Patient ID</td><td>".$patient['userid']."</td></tr>";
      echo "<tr><td>Full name</td><td>".$patient['name']."</td></tr>";
      echo "<tr><td>Email</td><td>".$patient['email']."</td></tr>";
      echo "<tr><td>Phone Number</td><td>".$patient['phoneNo']."</td></tr>";
      echo "<tr><td>Address</td><td>".$patient['address']."</td></tr>";
      echo "<tr><td>Close Contact</td><td>".$patient['closecontact']."</td></tr>";
      echo "<tr><td>Dieses History</td><td>".$patient['dieseshistory']."</td></tr>";

			echo "</table><br>";
      
      echo "<p align='center'><a href='updatepatientinfo.php?userid=".$userid."&name=".$name."&email=".$patient['email'].
      "&phoneNo=".$patient['phoneNo']."&address=".$patient['address']. "&closecontact=".$patient['closecontact']."&dieseshistory=".$patient['dieseshistory']."'><i class='fas fa-edit' style='font-size:22px'></i></a></p>";
		}

		
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		
?>

<!-- <html>
<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.505052343577!2d100.50324311471793!3d6.457509595328314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304cae152c08f777%3A0x76d78a9b0a4b933d!2sUniversiti%20Utara%20Malaysia!5e0!3m2!1sen!2smy!4v1618295285205!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
</html> -->






