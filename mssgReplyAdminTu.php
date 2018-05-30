<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

//$_SESSION['stuReply']="";

$reportNumber="";

$conn = new mysqli($servername, $username, $password, $dbname);
//$row = $result->fetch_assoc();

			 
				//$sql = "SELECT Email FROM reginfo Where PhoneNumber='$reportNumber'";
				//$result = $conn->query($sql);
				//$row = $result->fetch_assoc();
				
				//$_SESSION['tuReply']=$row['Email'];
		  
if(isset($_POST['SendBtn']))
{
	
	$conn->query("Insert Into message(Student,Message,Tutor,Sender,Admin) Values('','".$_POST['nextMssg']."','".$_SESSION['Uname']."','2','sanjida@gmail.com')");
	
}


//echo $_SESSION['stuReply'];

header("Location: http://localhost/TM/inboxToAdminTu.php");

?>