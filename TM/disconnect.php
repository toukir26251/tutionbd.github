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
				
				break;
			 }
		  }
		  }
		  

	
	$conn->query("Delete from connection where Tutor='".$row['Email']."' and Student='".$_SESSION['Uname']."'");
	


//echo $_SESSION['stuReply'];

header("Location: http://localhost/TM/inboxStu.php");

?>