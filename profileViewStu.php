<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$showVar="";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT PhoneNumber FROM reginfostu";
$result = $conn->query($sql);
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

<?php

	foreach($_POST as $name => $content) 
		{ // Most people refer to $key => $value
		   $showVar=$name;
		}

	if ($result->num_rows )
		  {
		  while($row = $result->fetch_assoc())
		  {
			 if($showVar==$row['PhoneNumber'])
			 {
				$sql = "SELECT * FROM reginfostu Where PhoneNumber='$showVar'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				
				echo '
				
				


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">'.$row['FullName'].'
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Porfile</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-6">
		<div class="card my">
          <h3 class="card-header" align="middle">Personal Info</h3>
          <form action="profileUpdateStudent.php" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                '.$row['FullName'].'
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                '.$row['FullName'].'
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                '.$row['Email'].'
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Education:</label>
               '.$row['Education'].'
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Location:</label>
					'.$row['Location'].'
              </div>
			 </div>
			 </div>
			 </div>
			 <br>
		     <div class="col-md-6 mb-4">
			 <div class="card my">
          <h3 class="card-header" align="middle">More Info</h3>
          <form method="post" action="profileUpdateStudent.php">
			<div class="control-group form-group">
              <div class="controls">
                <label>Giving Salary:</label>
					'.$row['Salary'].'
              </div>
            </div>
			
			<div class="control-group form-group">
              <div class="controls">
                <label>Subject 1:</label>
					'.$row['S1'].'
              </div>
			  <div class="control-group form-group">
              <div class="controls">
                <label>Subject 2:</label>
					'.$row['S2'].'
              </div>
			  
			 </div>
			 </div>
			 </div>
			  <br>
		<div class="card my">
		<h2 class="card-header" align="middle">Teacher Wanted Status</h2>
		Wanted : '.$row['Wanted'].'</br>
		
		</div>

      </div>
	  </form>
      <!-- /.row -->

      <!-- Related Projects Row -->

      <!-- /.row -->
		
    </div>
	';
	break;
			 }
		  }
		  }

?>

		<?php
		
			if(isset($_SESSION['Uname']))
			{
				$sqlRep = "Select Report1,Report2,Report3 from reginfostu Where Email='".$row['Email']."'";
				$res = $conn->query($sqlRep);
				$resRep=$res->fetch_assoc();
				
				if($resRep['Report1']==$_SESSION['Uname'] || $resRep['Report2']==$_SESSION['Uname'] || $resRep['Report3']==$_SESSION['Uname'])
				{
					echo '<button type="button" name="" class="btn btn-primary">" Reported Student "</button></div><br>';
				}
				
				else
				{
				
				echo '
		  
		  <form action="reportStu.php" method="post">
		  <button type="submit" name="'.$row['PhoneNumber'].'" class="btn btn-primary">" Report  This  Tutor "</button>
		  </form>
		  </div>
			<br>';
			}
			}
		  ?>

      <!-- /.row -->
	  
	  

      <!-- Related Projects Row -->

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