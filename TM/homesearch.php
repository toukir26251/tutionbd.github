<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT FullName,PhoneNumber,Email,Education,SOI1,SOI2,ExpectedStudent,Photo FROM reginfo where FullName='".$_POST['searchHome']."' or Location='".$_POST['searchHome']."' or SOI1='".$_POST['searchHome']."' or SOI2='".$_POST['searchHome']."'";
$sqlS = "SELECT FullName,PhoneNumber,Email,Location,Education,Salary,S1,S2 FROM reginfostu where FullName='".$_POST['searchHome']."' or Location='".$_POST['searchHome']."' or S1='".$_POST['searchHome']."' or S2='".$_POST['searchHome']."'";
$result = $conn->query($sql);
$resultS = $conn->query($sqlS);
?>


<!DOCTYPE html>
<html lang="en">

  <head>

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
        <a class="navbar-brand" href="home.php">Tutor Management</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
		
			if(isset($_SESSION['Uname']))
			{
				$sqlType = "SELECT Type FROM Login where Email='".$_SESSION['Uname']."'";

				$resultType = $conn->query($sqlType);

				$pass = $resultType->fetch_assoc();
				
				if($pass['Type']=="Tutor")
				{
					echo '
							<div class="collapse navbar-collapse" id="navbarResponsive">
					  <ul class="navbar-nav ml-auto">
						 <li class="nav-item ">
						  <a class="nav-link active dropdown" href="home.php">
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
						  <a class="nav-link" href="profile.php">Profile</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Log Out</a>
						</li>
					  </ul>
					</div>
							';
				}
	
				if($pass['Type']=="Student")
				{
					
					echo '
							<div class="collapse navbar-collapse" id="navbarResponsive">
					  <ul class="navbar-nav ml-auto">
						 <li class="nav-item ">
						  <a class="nav-link active dropdown" href="home.php">
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
						  <a class="nav-link" href="profileStudent.php">Profile</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Log Out</a>
						</li>
					  </ul>
					</div>
							';
					
				}
				if($pass['Type']=="Admin")
				{
					
					echo '
							<div class="collapse navbar-collapse" id="navbarResponsive">
					  <ul class="navbar-nav ml-auto">
						 <li class="nav-item ">
						  <a class="nav-link active dropdown" href="home.php">
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
						  <a class="nav-link" href="admin.php">Profile</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Log Out</a>
						</li>
					  </ul>
					</div>
							';
					
				}
				
				
			}
		if(!isset($_SESSION['Uname']))
		{
			
			echo '
			<div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<li class="nav-item active dropdown">
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
              <a class="nav-link" href="login.php">Log In</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
          </ul>
			</div>
			';
			
		}
		
		?>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Tutor Management
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
		<li class="breadcrumb-item active">Search Result</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-6">
			
		  <?php
		  while($row = $result->fetch_assoc())
		  {
			  
			  echo '<form action="profView.php" method="post">
			  <div class="card mb-4">
            <img class="card-img-top" src="'.$row['Photo'].'" height="350">
            <div class="card-body">
              <h2 class="card-title">'.$row["FullName"].'</h2>
              <p class="card-text">Bio : '.$row["Education"].' &nbsp; Interested : '.$row["SOI1"].','.$row["SOI2"].' &nbsp; Class : '.$row["ExpectedStudent"].'</p>
              <button type="submit" name="'.$row["PhoneNumber"].'" class="btn btn-primary">Read More &rarr;</button>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017
            </div>
          </div>
		  </form>';
			  
		  }
		  ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="tutors.html">All &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-6">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
			<form action="homesearch.php" method="post">
              <div class="input-group">
                <input type="text" name="searchHome" class="form-control" placeholder="Search by name/area/subject">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" >Go!</button>
                </span>
              </div>
			  </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="tutors.php">Tutor</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="tutions.php">Tution</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Tips</h5>
            <div class="card-body">
              You can put advertisement for tution and it's free. Just sign up an account and start posting.
            </div>
          </div>
		  
			<div class="row">
			
			<?php
		  if ($resultS->num_rows )
		  {
		  while($rowS = $resultS->fetch_assoc())
		  {
			  
			  echo '
			  <div class="col-lg-6 mb-4">
			  <form action="profileViewStu.php" method="post">
			  <div class="card h-100">
				<h4 class="card-header">'.$rowS['S1'].",".$rowS['S2'].'</h4>
				<div class="card-body">
				  <p class="card-text">Student Name : '.$rowS['FullName'].' &nbsp Education: '.$rowS['Education'].' &nbsp Location : '.$rowS['Location'].' &nbsp Day : 5days a week &nbsp Salary : '.$rowS['Salary'].'</p>
				</div>
				<div class="card-footer">
				  <button type="submit" name="'.$rowS['PhoneNumber'].'" class="btn btn-primary">Learn More</button>
				</div>
			  </div>
			  </form>
			  </div>
			  ';
			  
		  }
		  }
		  ?>
			
        </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
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
