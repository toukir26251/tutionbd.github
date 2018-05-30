<?php
session_start();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql1 = "Update login set BNum='".$_POST['Bphone']."',TrxID='".$_POST['trxid']."' where Email='".$_POST['email']."'";
//$sql2 = "Update reginfostu set Salary='".$_POST['salary']."',S1='".$_POST['sub1']."',S2='".$_POST['sub2']."',Medium='".$_POST['medium']."',Class='".$_POST['class']."' where Email='".$_SESSION['Uname']."'";
//$sql3 = "Update reginfostu set Wanted='".$_POST['Wanted']."' where Email='".$_SESSION['Uname']."'";

//if(isset($_POST['submitPaymentVarification']))
$conn->query($sql1);

$message = "Submitted to Admin";
echo "<script type='text/javascript'>alert('$message');</script>";
	
header("Refresh: 1,url=http://localhost/TM/home.php");

?>