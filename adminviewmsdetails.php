<?php
session_start();
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
	<title>Medical Staff Details</title>
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
			echo "<tr><td>Full name</td><td>".$medicalstaff['name']."</td></tr>";
			echo "<tr><td>Email</td><td>".$medicalstaff['email']."</td></tr>";
			echo "<tr><td>Phone Number</td><td>".$medicalstaff['phoneno']."</td></tr>";
			echo "<tr><td>Medical Number</td><td>".$medicalstaff['medicalno']."</td></tr>";


			echo "</table><br>";
    

		}

		
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		
?>