<?php
include_once("dbconnect.php");
$userid= $_GET['userid'];
$name = $_GET['name'];
$userid = $_GET['userid'];
$id = $_GET['id'];

if (isset($_GET['action'])) {
    try {
		$actionupdate = $_GET['actionupdate'];
        $sqlupdate = "UPDATE treatment SET  actionupdate = '$actionupdate' WHERE id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mspasttreatment.php?userid=".$userid."&name=".$name."') </script>;";
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
        <h1>Update Action </h1>
        
		<form action="msupdatetreatment.php" method="get">

        <input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
		<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>"><br>
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>"><br>
        <input type="hidden" id="action" name="action" value="update"><br>

        <label for="actionupdate">Action Update</label><br>
        <input type="text" id="actionupdate" name="actionupdate" placeholder="In Progress / Done " required><br>

        <input type="submit" value="Update">
        </form>

			<br><br>

        
    </div>
</body>
</html>
