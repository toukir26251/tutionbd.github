<?php
session_start();
?>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sqlT = "INSERT INTO `reginfo`(`FullName`, `PhoneNumber`, `Email`, `Education`, `Location`, `Salary`, `ExpectedStudent`, `SOI1`, `SOI2`, `Availability`, `Photo`,`Report`,`Profession`,`Medium`,`Class`,`Gender`) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['education']."','".$_POST['location']."','','','','','','images/pp.jpg','','','','','".$_POST['gender']."')";
$sqlS = "INSERT INTO `reginfostu`(`FullName`, `PhoneNumber`, `Email`, `Education`, `Location`, `Salary`, `S1`, `S2`, `Wanted`,`Medium`,`Class`,`Day`,`Gender`) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['education']."','".$_POST['location']."','','','','','','','','".$_POST['gender']."')";
$sql2 = "INSERT INTO login (Email,Password,Validity,Type,BNum,TrxID,Date) VALUES ('".$_POST['email']."','".$_POST['pass']."',0,'".$_POST['tutor']."','','','');";

if($_POST['tutor']=="Tutor")
{
	
	$conn->query($sqlT);
	$conn->query($sql2);
}
if($_POST['tutor']=="Student")
{
	
	$conn->query($sqlS);
	$conn->query($sql2);
	
}
	

	
	header("Location: http://localhost/TM/regMssg.php");
	


?>