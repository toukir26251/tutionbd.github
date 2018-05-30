<?php
session_start();
?>

<?php

echo $_SESSION['Uname'];
echo $_POST['salary'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql1 = "Update reginfo set FullName='".$_POST['name']."',PhoneNumber='".$_POST['phone']."',Education='".$_POST['education']."',Location='".$_POST['location']."',Gender='".$_POST['gender']."' where Email='".$_SESSION['Uname']."'";
$sql2 = "Update reginfo set Profession='".$_POST['profession']."',Salary='".$_POST['salary']."',ExpectedStudent='".$_POST['student']."',Medium='".$_POST['medium']."',Class='".$_POST['student']."',SOI1='".$_POST['sub1']."',SOI2='".$_POST['sub2']."' where Email='".$_SESSION['Uname']."'";
$sql3 = "Update reginfo set Availability='".$_POST['Available']."' where Email='".$_SESSION['Uname']."'";

if(isset($_POST['saveChange1']))
$conn->query($sql1);

if(isset($_POST['saveChange2']))
$conn->query($sql2);

if(isset($_POST['saveChange3']))
$conn->query($sql3);

header("Location: http://localhost/TM/profile.php");

?>