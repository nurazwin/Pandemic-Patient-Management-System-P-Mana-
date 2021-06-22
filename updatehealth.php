<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$userid = $_GET['userid'];
$name = $_GET['name'];
$temperature = $_GET['temperature'];
$behaviour = $_GET['behaviour'];
$symptom = $_GET['symptom'];
$medication = $_GET['medication'];
$date = $_GET['date'];
$time = $_GET['time'];


if (isset($_GET['action'])) {

    if ($temperature >37.8 && $temperature <52){
		$risklevel = "High Risk";
	} elseif ($temperature >35.5 && $temperature <37) {
		$risklevel = "Low Risk";
	} else {
		$risklevel = "Null";
	}

    try {
        $sqlupdate = "UPDATE healthpatient SET temperature = '$temperature', behaviour = '$behaviour', symptom = '$symptom', medication = '$medication', 
        date = '$date' , time = '$time', risklevel = '$risklevel' WHERE userid = '$userid' AND id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('historypatient.php?userid=".$userid."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
        echo "Error: " . $e->getMessage();
      }
    }
?>
<!DOCTYPE html>

	<html>
	<head>
		<title>Update Patient</title>
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
				<ul id="navli">
				</ul>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 175px">
        </div>

        <div class="box">
        <h1>Update Health, Mrs <?php echo $name?>  </h1>
        
		<form action="updatehealth.php" method="get">
        
        <input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>"><br>
        <input type="hidden" id="action" name="action" value="update"><br>

        <label for="temperature">Temperature</label><br>
        <input type="text" id="temperature" name="temperature" value="<?php echo $temperature;?>" required><br>

        <label for="behaviour">Behaviour</label><br>
        <input type="text"  id="behaviour" name="behaviour" value="<?php echo $behaviour;?>" required><br>

        <label for="symptom">Symptom</label><br>
        <input type="text" id="symptom" name="symptom" value="<?php echo $symptom;?>" required><br><br>

        <label for="medication">Medication</label><br>
        <input type="text" id="medication" name="medication" value="<?php echo $medication;?>" required><br><br>

        <label for="date">Date</label><br>
        <input type="date" id="date" name="date" value="<?php echo $date;?>" required><br><br>

        <label for="time">Time</label><br>
        <input type="time" id="time" name="time" value="<?php echo $time;?>" required><br><br>

        <input type="submit" value="Update">
        </form>
		
            <!-- <p>Temperature</p>
			<input type="text" id="temperature" name="temperature"placeholder="Temperature" required="required">
			<p>Behaviour</p>
            <input type="text" id="behaviour" name="behaviour"placeholder="Behaviour" required="required">
            <p>Symptom</p>
			<input type="text" id="symptom" name="symptom"placeholder="Symptom" required="required">
			<p>Medication</p>
			<input type="text" id="medication" name="medication"placeholder="Medication" required="required">
			<p>Date</p>
			<input type="date" id="date" name="date"placeholder="Date" required="required">
			<input type="submit" value="Submit"> -->

			<br><br>

			<p align="center"><a href="historypatient.php?userid=<?php echo $userid.'&name='.$name?>">Back</a></p>  
        
    </div>
</body>

</html>
