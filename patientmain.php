<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];


if (isset($_GET['submit'])) {
	$id = $_GET['id'];
	$temperature = $_GET['temperature'];
	$behaviour = $_GET['behaviour'];
	$symptom = $_GET['symptom'];
	$medication = $_GET['medication'];
	$date = $_GET['date'];
	$time = $_GET['time'];

	if ($temperature >37.8 && $temperature <52){
		$risklevel = "High Risk";
	} elseif ($temperature >35.5 && $temperature <37.7) {
		$risklevel = "Low Risk";
	} else {
		$risklevel = "Null";
	}

 try {
    $sql = "INSERT INTO healthpatient(id, temperature, behaviour, symptom, medication, date, time, risklevel, userid)
    VALUES ('$id', '$temperature', '$behaviour','$symptom', '$medication','$date','$time','$risklevel','$userid')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
	echo "<script> window.location.replace('historypatient.php?userid=".$userid."&name=".$name."') </script>;";
		
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
	
?>
<!DOCTYPE html>

	<html>
	<head>
		<title>Main Page</title>
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeclick" href="patientmain.php?userid=<?=$userid?>&name=<?=$name?>">Daily Update</a></li>
					<li><a class="homeblack" href="historypatient.php?userid=<?=$userid?>&name=<?=$name?>">Your History</a></li>
					<li><a class="homeblack" href="patienttreatment.php?userid=<?=$userid?>&name=<?=$name?>">Treatment</a></li>
                    <li><a class="homeblack" href="managepatient.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>
					<li><a class="homeblack" href="patientlogin.html">Logout</a></li>			
				</ul>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 175px">
		</div>

		<div class="box">
		<h1>Your Health Today Mr / Mrs, <?php echo $name?>  </h1>
		<form action="patientmain.php" method="get">
		<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
		<input type="hidden" id="id" name="id" value=""><br>
		

            <p>Temperature</p>
			<input type="text" id="temperature" name="temperature"placeholder="36.5 / 35.0 / 38.5" required="required">
			<p>Behaviour</p>
            <input type="text" id="behaviour" name="behaviour"placeholder="Shaking / Normal / Fever" required="required">
            <p>Symptom</p>
			<input type="text" id="symptom" name="symptom"placeholder="Cold / Flu / Cough" required="required">
			<p>Medication</p>
			<input type="text" id="medication" name="medication"placeholder="Paracetamol 500mg / Hurix 600 Fluaway / Vitamin C" required="required">
			<p>Date</p>
			<input type="date" id="date" name="date"placeholder="Date" required="required">
			<p>Time</p>
			<input type="time" id="time" name="time"placeholder="Time" required="required">
			
			<input type="submit" name="submit" value="Submit">
		
		
			</form>  
        
    </div>
	
</body>
</html>

