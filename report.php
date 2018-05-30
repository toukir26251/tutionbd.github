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
$sqlReports="SELECT Report1,Report2,Report3 FROM reginfo Where PhoneNumber='".$reportNumber."'";
$resultReports = $conn->query($sqlReports);
$rowReports = $resultReports->fetch_assoc();

$rep1=$rowReports['Report1'];
$rep2=$rowReports['Report2'];
$rep3=$rowReports['Report3'];

$sql = "SELECT Report FROM reginfo Where PhoneNumber='".$reportNumber."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
foreach ($row as $key => $val) {
    $inc=(int)$val;
}

if($_SESSION['Uname']!=$rep1 || $_SESSION['Uname']!=$rep2 || $_SESSION['Uname']!=$rep3 )
{

if($inc>=2)
{
	
	$conn->query("UPDATE `login` SET `Validity`=0 WHERE Email=(SELECT Email from reginfo where PhoneNumber='".$reportNumber."')");
	$conn->query("UPDATE `reginfo` SET `Availability`='no' WHERE PhoneNumber='".$reportNumber."'");
	
}

if($inc==0)
{
	$conn->query("UPDATE `reginfo` SET `Report1`='".$_SESSION['Uname']."' WHERE PhoneNumber='".$reportNumber."'");
}

if($inc==1)
{
	$conn->query("UPDATE `reginfo` SET `Report2`='".$_SESSION['Uname']."' WHERE PhoneNumber='".$reportNumber."'");
}

if($inc==2)
{
	$conn->query("UPDATE `reginfo` SET `Report3`='".$_SESSION['Uname']."' WHERE PhoneNumber='".$reportNumber."'");
	
}

$inc=$inc+1;

$conn->query("UPDATE `reginfo` SET Report='".$inc."' WHERE PhoneNumber='".$reportNumber."'");

}

header("location:javascript://history.go(-1)");
//header("<?php

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
		
		//echo $reportNumber;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT Email FROM reginfo Where PhoneNumber='".$reportNumber."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



	
	$conn->query("INSERT INTO connection (Tutor,Student,Connection) VALUES ('".$row['Email']."','".$_SESSION['Uname']."',1)");
	//$conn->query("UPDATE `Connection` SET `Availability`='no' WHERE PhoneNumber='".$reportNumber."'");



header("location:javascript://history.go(-1)");
//header("Location: http://localhost/TM/profView.php");
	

?>");
	

?>