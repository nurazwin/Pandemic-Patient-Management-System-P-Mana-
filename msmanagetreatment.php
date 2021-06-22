<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$medicalstaffid = $_GET['medicalstaffid'];
	$medicine = $_GET['medicine'];
	$advice = $_GET['advice'];
	$action = $_GET['action'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	$userid = $_GET['userid'];

 try {
    $sql = "INSERT INTO treatment(id, medicalstaffid, medicine, advice, action, date, time, userid)
    VALUES ('$id', '$medicalstaffid', '$medicine', '$advice', '$action', '$date', '$time', '$userid')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
	echo "<script> window.location.replace('mspasttreatment.php?userid=".$userid."&name=".$name."') </script>;";
		
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
	
?>
<!DOCTYPE html>

	<html>
	<head>
		<title>Manage Treatment</title>
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>P-MANA</h1>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 175px">
		</div>

		<div class="box">
		<h1>Treatment for Mr / Mrs, <?php echo $name?>  </h1>
		<form action="msmanagetreatment.php" method="get">
		<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
		<input type="hidden" id="id" name="id" value=""><br>
		

			<p>Staff ID</p>
			<input type="text" id="medicalstaffid" name="medicalstaffid"placeholder="Medical Staff ID" required="required">
			<p>Medicine</p>
			<input type="text" id="medicine" name="medicine"placeholder="Medicine" required="required">
			<p>Advice</p>
            <input type="text" id="advice" name="advice"placeholder="Advice" required="required">
			<p>Action</p>
            <input type="text" id="action" name="action"placeholder="Warded / Make an Appointment / Hospitalized" required="required">
			<p>Date</p>
			<input type="date" id="date" name="date"placeholder="Date" required="required">
			<p>Time</p>
			<input type="time" id="time" name="time"placeholder="time" required="required">
			
			<input type="submit" value="Submit">
		
			</form>  
        
    </div>
	
</body>
</html>

