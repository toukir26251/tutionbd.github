<?php
session_start();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql1 = "Update login set Validity='1', Date='".$_POST['dateStu']."' where Email='".$_POST['emailStu']."'";
$sql2 = "Update login set Validity='0' where Email='".$_POST['emailStu']."'";
$sql3 = "Update login set Validity='1', Date='".$_POST['dateTu']."' where Email='".$_POST['emailTu']."'";
$sql4 = "Update login set Validity='0' where Email='".$_POST['emailTu']."'";

if(isset($_POST['AVStu']))
$conn->query($sql1);

if(isset($_POST['DVStu']))
$conn->query($sql2);

if(isset($_POST['AVTu']))
$conn->query($sql3);

if(isset($_POST['DVTu']))
$conn->query($sql4);

header("Location: http://localhost/TM/admin.php");

?>