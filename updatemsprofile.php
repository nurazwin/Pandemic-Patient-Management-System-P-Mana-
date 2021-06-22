<?php
include_once("dbconnect.php");
$userid = $_GET['userid'];
$name = $_GET['name'];
$email = $_GET['email'];
$phoneno = $_GET['phoneno'];
$medicalno = $_GET['medicalno'];

if (isset($_GET['action'])) {
    try {
        $sqlupdate = "UPDATE medicalstaff SET email = '$email',phoneno = '$phoneno', medicalno = '$medicalno' WHERE userid = '$userid' AND name = '$name'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('msprofile.php?userid=".$userid."&name=".$name."') </script>;";
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
<body>
    <!DOCTYPE html>

	<html>
	<head>
		<title>Update Medical Staff</title>
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
        <h1>Update Information, Mrs <?php echo $name?>  </h1>
        
		<form action="updatemsprofile.php" method="get">
        
        <input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="action" name="action" value="update"><br>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email;?>" required><br>

        <label for="phoneno">Phone No</label><br>
        <input type="text"  id="phoneno" name="phoneno" value="<?php echo $phoneno;?>" required><br>

        <label for="medicalno">Medical Staff Number</label><br>
        <input type="text" id="medicalno" name="medicalno" value="<?php echo $medicalno;?>" required><br><br>

        <input type="submit" value="Update">
        </form>

			<br><br>

			<p align="center"><a href="msprofile.php?userid=<?php echo $userid.'&name='.$name?>">Back</a></p>  
        
    </div>
</body>
</html>
