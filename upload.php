<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);




if(isset($_POST["submitImage"])) {
    $file=$_FILES['fileToUpload'];
	print_r($file);
	$filename = $_FILES['fileToUpload']['name'];
	$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
	$fileSize = $_FILES['fileToUpload']['size'];
	$fileError = $_FILES['fileToUpload']['error'];
	$fileType = $_FILES['fileToUpload']['type'];
	
	$fileExt= explode('.',$filename);
	$fileActualExt= strtolower(end($fileExt));
	
	$allowed = array('jpg','jpeg','png');
	
	if(in_array($fileActualExt,$allowed))
	{
		if($fileError==0)
		{
			$newFileName=uniqid('',true).".".$fileActualExt;
			$fileDes='images/'.$newFileName;
			move_uploaded_file($fileTmpName,$fileDes);
			
			$sql="UPDATE `reginfo` SET `Photo`='images/".$newFileName."' WHERE Email='".$_SESSION['Uname']."'";
			$conn->query($sql);
			
			header("Location: http://localhost/TM/profile.php");
			
			
		}
		else
			echo "error";
	}
	else
		echo "Type";
	
}
?>