<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

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
        <a class="navbar-brand" href="index.html">Tutor Management</a>
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
						  <a class="nav-link active dropdown" href="about.php">About</a>
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
						  <a class="nav-link" href="home.php">
							Home
						  </a>
						</li>
						<li class="nav-item">
						  <a class="nav-link " href="tutors.php">Tutors</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="tutions.php">Tutions</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active dropdown" href="about.php">About</a>
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
						  <a class="nav-link active dropdown" href="about.php">About</a>
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
			<li class="nav-item">
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
              <a class="nav-link active dropdown" href="about.php">About</a>
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
      <h1 class="mt-4 mb-3">About
        <small>Author</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            <h5><span>&#169;</span>Sanjida Akter</h5>
            City University
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: +8801700000000
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="Sanjida2593cse@gmail.com">Sanjida2593cse@gmail.com
            </a>
          </p>
		  <br>
		  <p>
            <h5><span>&#169;</span>Eshrat Jahan</h5>
            City University
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: +8801722334455
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="easrat.cse.34@gmail.com">easrat.cse.34@gmail.com
            </a>
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      

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

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
