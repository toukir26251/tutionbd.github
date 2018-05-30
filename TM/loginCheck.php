<?php
session_start();
?>

<?php

$_SESSION['UnameFirst']=$_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT Password,Type,Validity FROM Login where Email='".$_SESSION['UnameFirst']."'";

$result = $conn->query($sql);

$pass = $result->fetch_assoc();


$confirmation ="no";

	if(trim($_POST['pass'])==trim($pass['Password']))
	{
		$confirmation = "yes";
		
		//break;
	}
	else 
		$confirmation = "no";

	if($confirmation == "yes")
	{
	if($pass['Type']=="Tutor")
	{
		if($pass['Validity']=='1')
		{
			$_SESSION['Uname']= $_SESSION['UnameFirst'];
			header("Location: http://localhost/TM/profile.php");
		}

		else
			header("Location: http://localhost/TM/invalid.php");
	}
	
	if($pass['Type']=="Student")
		{
		if($pass['Validity']=='1')
		{
			$_SESSION['Uname']= $_SESSION['UnameFirst'];
			header("Location: http://localhost/TM/profileStudent.php");
		}

		else
			header("Location: http://localhost/TM/invalid.php");
		}
	if($pass['Type']=="Admin")
		{
			$_SESSION['Uname']= $_SESSION['UnameFirst'];
			header("Location: http://localhost/TM/admin.php");
		}
	}
	else
	{
		//echo $pass['Pass'];
		
		$message = "Your Email or Password is not Correct";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		header("Refresh: 1,url=http://localhost/TM/login.php");
		
		//$_SESSION["errorMSG"] = "Wrong user or password";
	}

//header("Location: http://localhost/TM/login.php");

?>