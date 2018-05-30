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
$connResult = $conn->query("Select Connection from connection where Student='".$_SESSION['Uname']."' and Tutor='".$_SESSION['tuReply']."'");
$connRow = $connResult->fetch_assoc();
		  
if(isset($_POST['SendBtn']) && $connRow['Connection']==2)
{
	
	$conn->query("Insert Into message(Student,Message,Tutor,Sender,Admin,MssgSeen) Values('".$_SESSION['Uname']."','".$_POST['nextMssg']."','".$_SESSION['tuReply']."','1','','1')");
	
}


//echo $_SESSION['stuReply'];

header("Location: http://localhost/TM/inboxStu.php");

?>