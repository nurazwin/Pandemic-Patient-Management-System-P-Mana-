<?php
session_start();
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
?>

<!DOCTYPE html>

	<html>
	<title>History Patient</title>
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
					<li><a class="homeclick" href="historypatient.php?userid=<?=$userid?>&name=<?=$name?>">Your History</a></li>
					<li><a class="homeblack" href="patienttreatment.php?userid=<?=$userid?>&name=<?=$name?>">Treatment</a></li>
                    <li><a class="homeblack" href="managepatient.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>
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
//delete operation
    if (isset($_GET['action'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM healthpatient WHERE id='$id'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }
   
	try {
			$sql = "SELECT * FROM healthpatient WHERE userid = '$userid' ";    
			$stmt = $conn->prepare($sql );
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$healthpatient = $stmt->fetchAll(); 


		echo "<p><h1 align='center'>History Patient</h1></p>";

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
        <th>Action</th>
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
            
            
            
			echo "<td><a href='historypatient.php?userid=".$userid."&name=".$name."&id=".$healthpatient['id']."&action=del' onclick= 'return confirm(\"Delete. Are your sure?\");'><i class='fas fa-trash' style='font-size:22px'></i></a>
			<a href='updatehealth.php?userid=".$userid."&name=".$name."&id=".$healthpatient['id']."&temperature=".$healthpatient['temperature'].
            "&behaviour=".$healthpatient['behaviour']."&symptom=".$healthpatient['symptom']."&medication=".$healthpatient['medication'].
			"&date=".$healthpatient['date']."&time=".$healthpatient['time']."&risklevel=".$healthpatient['risklevel']."'><i class='fas fa-edit' style='font-size:22px'></i></a></td>";

            }

// 			<a href='updateProject.php?adminID=".$adminID."&id=".$project['id']."&matricNo=".$project['matricNo']."&name=".$project['name']."&phoneNo=".$project['phoneNo']."
// &email=".$project['email']."&session=".$project['session']."&title=".$project['title']."&majoring=".$project['majoring']."&category=".$project['category']."
// &myfile=".$project['filename']."'><i class='fas fa-edit' style='font-size:24px'></i></a>
            echo "</table>";

			// <i class='fas fa-edit'
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		
?>

