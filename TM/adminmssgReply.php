<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

//$_SESSION['stuReply']="";

$reportNumber="";

$conn = new mysqli($servername, $username, $password, $dbname);

foreach($_POST as $name => $content) 
		{ // Most people refer to $key => $value
		   $reportNumber=$name;
		   
		}
		//echo $reportNumber;
		
$sql ="SELECT PhoneNumber FROM reginfo";
$result = $conn->query($sql);
//$row = $result->fetch_assoc();

if ($result->num_rows )
		  {
		  while($row = $result->fetch_assoc())
		  {
			 if($reportNumber==$row['PhoneNumber'])
			 {
				$sql = "SELECT Email FROM reginfo Where PhoneNumber='$reportNumber'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				
				$_SESSION['tuReply']=$row['Email'];
				
				break;
			 }
		  }
		  }
		  
if(isset($_POST['SendBtn']))
{
	
	$conn->query("Insert Into message(Student,Message,Tutor,Sender,Admin,MssgSeen) Values('','".$_POST['nextMssg']."','".$_SESSION['tuReply']."','3','".$_SESSION['Uname']."','1')");
	
}


//echo $_SESSION['stuReply'];

header("Location: http://localhost/TM/adminInbox.php");

?>