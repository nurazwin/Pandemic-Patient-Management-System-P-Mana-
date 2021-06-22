<?php
include_once("dbconnect.php");
$userid = $_GET['userid'];
$name = $_GET['name'];
$email = $_GET['email'];
$phoneNo = $_GET['phoneNo'];
$address = $_GET['address'];
$closecontact = $_GET['closecontact'];
$dieseshistory = $_GET['dieseshistory'];


if (isset($_GET['action'])) {
    try {
        $sqlupdate = "UPDATE patient SET email = '$email',phoneNo = '$phoneNo', address = '$address',closecontact = '$closecontact', dieseshistory = '$dieseshistory' WHERE userid = '$userid' AND name = '$name'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('managepatient.php?userid=".$userid."&name=".$name."') </script>;";
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
	<title>PPMS - Update</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body><!DOCTYPE html>

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
				    <li><a class="homeblack" href="patientmain.php?userid=<?=$userid?>&name=<?=$name?>">Daily Update</a></li>
					<li><a class="homeblack" href="historypatient.php?userid=<?=$userid?>&name=<?=$name?>">Your History</a></li>
					<li><a class="homeblack" href="patienttreatment.php?userid=<?=$userid?>&name=<?=$name?>">Treatment</a></li>
                    <li><a class="homeblack" href="managepatient.php?userid=<?=$userid?>&name=<?=$name?>">Back</a></li>		
					
				</ul>
			</nav>
		</header>
		
		<div class="divider"></div>
		<div id="divimg">
			
		</div>
		<div style="margin-top: 175px">
        </div>
        
        <div class="box">
        <h1>Update Information, Mr/Mrs <?php echo $name?>  </h1>
        
		<form action="updatepatientinfo.php" method="get">
        
        <input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="action" name="action" value="update"><br>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email;?>" required><br>

        <label for="phoneNo">Phone No</label><br>
        <input type="text"  id="phoneNo" name="phoneNo" value="<?php echo $phoneNo;?>" required><br>

        <label for="address">Address</label><br>
        <input type="text" id="address" name="address" value="<?php echo $address;?>" required><br><br>

        <label for="closecontact">Close Contact</label><br>
        <input type="text" id="closecontact" name="closecontact" value="<?php echo $closecontact;?>" required><br><br>

        <label for="dieseshisory">Dieses History</label><br>
        <input type="text" id="dieseshistory" name="dieseshistory" value="<?php echo $dieseshistory;?>" required><br><br>
		
        <input type="submit" value="Update">
        </form>
		
			<br><br>
        
    </div>
</body>
</html>
