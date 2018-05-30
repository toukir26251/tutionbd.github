<?php
session_start();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT Password,Type,Validity FROM Login where Email='".$_SESSION['Uname']."'";

$result = $conn->query($sql);

$pass = $result->fetch_assoc();


if(trim($_POST['current'])==trim($pass['Password']))
{
	if(trim($_POST['new'])==trim($_POST['confirm']))
	{
		$sql1 = "Update login set Password='".$_POST['new']."' where Email='".$_SESSION['Uname']."'";

		//if(isset($_POST['save']))
		$conn->query($sql1);
		
		if($pass['Type']=="Tutor")
		{
			$message = "Your Password is changed";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 1,url=http://localhost/TM/profile.php");
		}
		if($pass['Type']=="Student")
		{
			$message = "Your Password is changed";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 1,url=http://localhost/TM/profileStudent.php");
		}
	}
	else
	{
		$message = "Your New Password and Confirm Password is not Same";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 1,url=http://localhost/TM/changePass.php");
	}
}
else
	{
		$message = "You entered a wrong password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 1,url=http://localhost/TM/changePass.php");
		//header("location:javascript://history.go(-1)");
	}






?>