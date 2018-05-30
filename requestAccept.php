<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$reportNumber="";
$inc;

foreach($_POST as $name => $content) 
		{ // Most people refer to $key => $value
		   $reportNumber=$name;
		}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT Email FROM reginfostu Where PhoneNumber='".$reportNumber."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


//echo $reportNumber;
	
	//$conn->query("INSERT INTO connection (Tutor,Student,Connection) VALUES ('".$row['Email']."','".$_SESSION['Uname']."',1)");
	$conn->query("UPDATE `connection` SET `Connection`=2 WHERE Student='".$row['Email']."' and Tutor='".$_SESSION['Uname']."'");



header("location:javascript://history.go(-1)");
//header("Location: http://localhost/TM/profView.php");
	

?>