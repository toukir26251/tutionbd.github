

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
//$sqlS = "SELECT * FROM `login` where Type='Student' and Validity='0' Order by Email ASC";
$sqlT = "SELECT * FROM `login` where Type='Tutor' and Validity='0' Order by Email ASC";
//$resultS = $conn->query($sqlS);
$resultT = $conn->query($sqlT);
//$rowS = $resultS->fetch_assoc();
//$rowT = $resultT->fetch_assoc();

?>

<?php
if(isset($_SESSION['Uname']))
{
?>

  <head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <a class="navbar-brand" href="index.html">Admin</a>
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
              <a class="nav-link" href="login.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Hello Admin
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin Panel</li>
      </ol>
	

	<div class="row">
	  <div class="col-md-3">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xlarge"><i class="fa fa-address-card-o"></i> <a style="font-size:13px" href="adminStudentV.php">Students Validation</a> </li>  
		  </ul>
		</div>
	  </div>
	   <div class="col-md-3">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xlarge"><i class="fa fa-address-card"></i> <a style="font-size:13px">Tutors Validation</a> </li>  
		  </ul>
		</div>
	  </div>
	  <div class="col-md-3">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xlarge"><i class="fa fa-commenting-o"></i> <a style="font-size:13px" href="adminInbox.php">Tutors</a> </li>  
		  </ul>
		</div>
	  </div>
	  <div class="col-md-3">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xlarge"><i class="fa fa-commenting"></i> <a style="font-size:13px" href="adminInboxStu.php">Students</a> </li>  
		  </ul>
		</div>
	  </div>
	</div>
	
      <!-- Portfolio Item Row -->

        <div class="col-md-12">
		<div class="card my">
		<h2 class="card-header" align="middle">Tutors</h2><br>
          <?php
			echo "<table border='4' align='center'>
			<tr>
			<th>Email</th>
			<th>Paid Number</th>
			<th>TrxID</th>
			<th>Date</th>
			<th>Validity</th>
			</tr>";

			while($rowT = mysqli_fetch_array($resultT))
			{
			echo "<tr>";
			echo "<td>" . $rowT['Email'] . "</td>";
			echo "<td>" . $rowT['BNum'] . "</td>";
			echo "<td>" . $rowT['TrxID'] . "</td>";
			echo "<td>" . $rowT['Date'] . "</td>";
			echo "<td>" . $rowT['Validity'] . "</td>";
			//echo "<td>" . $rowS['Validity'] . "</td>";
			echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);
			?>
        </div>

        <br>
      <!-- /.row -->

      <!-- Related Projects Row -->


		<div class="col-md-12">
		
		<div class="card my">
		<h2 class="card-header" align="middle">Change Validity of Tutors</h2>
		<form method="post" action="UpdateValidity.php">
			<div class="control-group form-group">
              <div class="controls">
                <label>Email:</label>
				<input type="text" class="form-control" name="emailTu">
              </div>
			 </div>
			 <div class="control-group form-group">
              <div class="controls">
                <label>Date:</label>
				<input type="text" class="form-control" name="dateTu"><br>
              </div>
			 </div>
		</div><br>
		<button type="submit" class="btn btn-primary" name="AVTu">Activate Validity</button>
		</div>
      <!-- /.row -->

	<br>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Tutor Management @ 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php
}
else
	header("Location: http://localhost/TM/login.php");
?>