<?php
include_once("dbconnect.php");
$name = $_GET['adminname']; 
$email = $_GET['email'];
?>

<!DOCTYPE html>

<html>
<head>
	<title>Add Medical Staff</title>
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

	<div class="loginbox">
        <h1>Register Medical Staff</h1>
        <form action="msregister.php" method="POST">

            <label for="userid">Medical Staff ID</label><br>
            <input type="text" id="userid" name="userid" placeholder="Medical Staff ID"value="" required><br>

            <label for="name">Medical Staff Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter Name"value="" required><br>

            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="Enter Email"value="" required><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password"value="" required><br>
    
            <input type="submit" name="login-submit" value="Submit">
           
        </form>
        
    </div>
</body>
</html>