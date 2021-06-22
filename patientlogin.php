<?php
session_start();
include_once("dbconnect.php");

$email = $_GET['email']; 
$password = sha1($_GET['password']);

try {
    $sql = "SELECT * FROM patient WHERE email = '$email' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();  

    if ($count > 0){
        foreach($users as $patient) {
           $userid = $patient['userid'];
           $email = $patient['email'];
            $name = $patient['name'];
        } 
        // setcookie("timer", "10s", time()+10000000,"/");

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('patientmain.php?userid=".$userid."&name=".$name."') </script>;";
    }
    // else{

    //     echo "<script> alert('Login Failed')</script>";
    //     echo "<script> window.location.replace('patientlogin.html') </script>;";

    // }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    echo "<script> alert('Login Failed')</script>";
    //echo "<script> window.location.replace('patientlogin.html') </script>;";
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>