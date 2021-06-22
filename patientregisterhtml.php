<?php
include_once("dbconnect.php");
$userid = $_GET['userid']; 
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Register | PPMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<header>
		<nav>
			<h1>P-MANA</h1>
				<ul id="navli">
					<li><a class="homeblack" href="msmain.php?userid=<?=$userid?>&name=<?=$name?>">List Patient</a></li>
					<li><a class="homeclick" href="patientregister.html?userid=<?=$userid?>&name=<?=$name?>">Add Patient</a></li>
                    <li><a class="homeblack" href="msprofile.php?userid=<?=$userid?>&name=<?=$name?>">Profile</a></li>	
                    <li><a class="homeblack" href="mslogin.html">Logout</a></li>		
				</ul>
			</nav>
		</header>
	<div class="divider"></div>

	<div class="loginbox">
        <h1>Register Patient Here</h1>
        <form action="patientregister.php" method="POST">

            <label for="userid">Patient ID</label><br>
            <input type="text" id="userid" name="userid" placeholder="Patient ID"value="" required><br>

            <label for="name">Patient Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter Name"value="" required><br>

            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="Enter Email"value="" required><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password"value="" required><br>
    
            <input type="submit" name="login-submit" value="Submit">
           
        </form>
        
        <br><br>
    
    </div>

   
</body>
</html>