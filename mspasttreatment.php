<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Past Treatment | PPMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<header>
		<nav>
			<h1>P-MANA</h1>
				<ul id="navli">
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
<?php
$sql = "SELECT *
FROM treatment
WHERE treatment.userid = '$userid'";

$stmt = $conn->prepare($sql );
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$treatment = $stmt->fetchAll();

echo "<p><h1 align='center'>View Past Treatment</h1></p>";

		echo "<p></p>";
		echo "<p></p>";

		
		echo "<table border='1' align='center'>;

		<tr>
		<th>Medical Staff Involve</th>
        <th>Date</th>
		<th>Time</th>
        <th>Medicine Suggested</th>
        <th>Advice</th>
		<th>Action Taken</th>
		<th>Action Update</th>
		<th>Update</th>
        </tr>";
			
			foreach($treatment as $treatment) {
			echo "<tr>";
            echo "<td>".$treatment['medicalstaffid']."</td>";
			echo "<td>".$treatment['Date']."</td>";
			echo "<td>".$treatment['time']."</td>";
			echo "<td>".$treatment['medicine']."</td>";
			echo "<td>".$treatment['advice']."</td>";
			echo "<td>".$treatment['action']."</td>";
			echo "<td>".$treatment['actionupdate']."</td>";
			echo "<td><a href='msupdatetreatment.php?userid=".$userid."&name=".$name."&userid=".$treatment['userid']."&id=".$treatment['id']."'><i class='fas fa-edit' style='font-size:22px'></i></a></td>";

            }
            echo "</table>";

?>