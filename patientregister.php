<?php
include_once("dbconnect.php");

//if (isset($_COOKIE["timer"])){

//get data first
$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email']; 
$password = sha1($_POST['password']);


        try {
            $sql = "INSERT INTO patient(userid, name, email, password)
            VALUES ('$userid','$name', '$email', '$password')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert('Registration Success')</script>";
            echo "<script> window.location.replace('msmain.php?userid=".$userid."&name=".$name."') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Error')</script>";
            echo "<script> window.location.replace('patientregister.html') </script>;";
        }
        $conn = null;
     
    //  else{
    //       echo "<script> alert('Image upload error')</script>";
    //       echo "<script> window.location.replace('register.html') </script>;";
    //  }

?>