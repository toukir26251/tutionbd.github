<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

//$sql = "INSERT INTO reginfo (FullName, PhoneNumber, Email, Education, Location , Salary , ExpectedStudent, SOI1, SOI2 , Availablity , Photo) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['education']."','".$_POST['location']."',0,'','','','','')";
$sql = "SELECT * FROM `reginfo` where Email='".$_SESSION['Uname']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqlReq = "SELECT Tutor FROM `connection` where Admin='sanjida@gmail.com' and Student=''";
$resultReq = $conn->query($sqlReq);


$sqlMssgTu = "SELECT Student FROM `message` where Admin='".$_SESSION['Uname']."' and Tutor='' Group by Student";
$resultMssgTu = $conn->query($sqlMssgTu);

//$rowMssg = $resultMssg->fetch_assoc();

//$sqlReq = "SELECT Student FROM `connection` where Connection=1";
//$resultReq = $conn->query($sqlReq);
//$rowReq = $resultReq->fetch_assoc();

?>

<?php
if(isset($_SESSION['Uname']))
{
?>

  <head>
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tutor_Management</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
  
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="homr.php">Tutor Management</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			 <li class="nav-item ">
              <a class="nav-link" href="home.php">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tutors.php">Tutors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tutions.php">Tutions</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
			<li class="nav-item">
			  <a class="nav-link active dropdown" href="admin.php">Profile</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?php echo $row['FullName']; ?>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Inbox</li>
      </ol>
	  
	  <div class="row">

        <div class="col-md-3">
	  
	<h2>Turors</h2>
	<?php
	while($rowMssg = mysqli_fetch_array($resultMssgTu))
			{
				$sqlMssgNew = "SELECT MssgSeen FROM `message` where IndexNum=(Select Max(IndexNum) from message where Admin='".$_SESSION['Uname']."' and Student='".$rowMssg['Student']."')";
				$resultMssgNew = $conn->query($sqlMssgNew);
				$rowMssgNew = $resultMssgNew->fetch_assoc();
				
				if($rowMssgNew['MssgSeen']=='1')
				{
					echo '<b>'.$rowMssg['Student'].'</b>';
				}
				
				else
					echo $rowMssg['Student'];
				
				$sqlPhnTu = "SELECT PhoneNumber FROM `reginfostu` where Email='".$rowMssg['Student']."'";
				$resultPhnTu = $conn->query($sqlPhnTu);
				$rowPhnTu = $resultPhnTu->fetch_assoc();
				
				echo '
					<form action="adminmssgReplyStu.php" method="post">
					<button type="submit" name="'.$rowPhnTu['PhoneNumber'].'" class="btn btn-primary">Reply</button>
					</form>
					<br>';
			}
?>
</div>


	<div class="col-md-7">
	<form action="adminmssgReplyStu.php" method="post">
	<input type="text" class="form-control" name="nextMssg">
	
	<?php
	
		if(isset($_SESSION['stuReply']))
		{
			$sqlChtBox ="Select Message,Sender from message where Student='".$_SESSION['stuReply']."' and Admin='sanjida@gmail.com' Order By IndexNum DESC";
			$resultChtBox = $conn->query($sqlChtBox);
			
			while($rowChtBox = mysqli_fetch_array($resultChtBox))
			{
				
				if($rowChtBox['Sender']==1)
				{
					echo "<p align='right'><font size='5pd' color='green'>".$rowChtBox['Message']." : ";
					echo $_SESSION['stuReply']."</font></p><br>";
					
				}
				
				if($rowChtBox['Sender']==3)
				{
					echo "<p align='left'><font size='5pd' color='blue'>ME : ";
					echo $rowChtBox['Message']."</font></p><br>";
					
				}
				
			}
			
		}
		$conn->query("Update message set MssgSeen='2' where Admin='".$_SESSION['Uname']."' and Tutor='' and Sender='1'");
		
		
	?>
	
	</div>
	
	<div class="col-md-1">
	
	<button type="submit" class="btn btn-primary" name="SendBtn">Send</button>
	</form>
	</div>

	
	
</div>
  </body>

</html>

<?php
}
else
	header("Location: http://localhost/TM/login.php");
?>
