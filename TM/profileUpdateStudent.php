<?php
session_start();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql1 = "Update reginfostu set FullName='".$_POST['name']."',PhoneNumber='".$_POST['phone']."',Education='".$_POST['education']."',Location='".$_POST['location']."',Gender='".$_POST['gender']."' where Email='".$_SESSION['Uname']."'";
$sql2 = "Update reginfostu set Salary='".$_POST['salary']."',S1='".$_POST['sub1']."',S2='".$_POST['sub2']."',Medium='".$_POST['medium']."',Class='".$_POST['class']."',Day='".$_POST['day']."' where Email='".$_SESSION['Uname']."'";
$sql3 = "Update reginfostu set Wanted='".$_POST['Wanted']."' where Email='".$_SESSION['Uname']."'";

if(isset($_POST['saveChange1']))
$conn->query($sql1);

if(isset($_POST['saveChange2']))
$conn->query($sql2);

if(isset($_POST['saveChange3']))
$conn->query($sql3);

header("Location: http://localhost/TM/profileStudent.php");

?>