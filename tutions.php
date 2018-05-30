<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$sql = "SELECT FullName,PhoneNumber,Email,Education,SOI1,SOI2,ExpectedStudent FROM reginfo";
$sqlS = "SELECT FullName,PhoneNumber,Email,Location,Education,Salary,S1,S2 FROM reginfostu";
//$result = $conn->query($sql);
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
						  <a class="nav-link" href="home.php">
							Home
						  </a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="tutors.php">Tutors</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active dropdown" href="tutions.php">Tutions</a>
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
						  <a class="nav-link" href="home.php">
							Home
						  </a>
						</li>
						<li class="nav-item">
						  <a class="nav-link " href="tutors.php">Tutors</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active dropdown" href="tutions.php">Tutions</a>
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
						  <a class="nav-link" href="home.php">
							Home
						  </a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="tutors.php">Tutors</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active dropdown" href="tutions.php">Tutions</a>
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
			<li class="nav-item">
              <a class="nav-link" href="home.php">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tutors.php">Tutors</a>
            </li>
            <li class="nav-item active dropdown">
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
      <h1 class="mt-4 mb-3">Tutions
        <small>All</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
         <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Tutions</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" src="images/tuitions.jpg" alt="">

	  <h3>Filter</h3>
	   <form method="post" action="tutionssearch.php">
	  <div class="row">
		  <div class="col-md-3">
			<div class="control-group form-group">
              <div class="controls">
                <label>Area:</label>
					<select name="areaS" class="form-control">
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="Arambag">Arambag</option>
					  <option value="Airport">Airport</option>
					  <option value="Azimpur">Azimpur</option>
					  <option value="Badda">Badda</option>
					  <option value="Banani">Banani</option>
					  <option value="Bongshal">Bongshal</option>
					  <option value="Chakbazar">Chakbazar</option>
					  <option value="Dakkhinkhan">Dakkhinkhan</option>
					  <option value="Darussalam">Darussalam</option>
					  <option value="Demra">Demra</option>
					  <option value="Dhanmandi">Dhanmondi</option>
					  <option value="Gandaria">Gandaria</option>
					  <option value="Gulshan">Gulshan</option>
					  <option value="Hazaribag">Hazaribag</option>
					  <option value="Jatrabari">Jatrabari</option>
					  <option value="Kafrul">Kafrul</option>
					  <option value="Kalabagan">Kalabagan</option>
					  <option value="Kamrangirchor">Kamrangirchor</option>
					  <option value="Khilgaon">Khilgaon</option>
					  <option value="Khilkhet">Khilkhet</option>
					  <option value="Lalbag">Lalbag</option>
					  <option value="Mirpur">Mirpur</option>
					  <option value="Mohammadpur">Mohammadpur</option>
					  <option value="Matijhil">Matijhil</option>
					  <option value="Paltan">Paltan</option>
					  <option value="Rampura">Rampura</option>
					  <option value="Romna">Romna</option>
					  <option value="Shyamoli">Shyamoli</option>
					  <option value="Tejgaon">Tejgaon</option>
					  <option value="Uttara">Uttara</option>'
					  ?>
					</select>
              </div>
            </div>
			</div>
			
			<div class="col-md-3">
			<div class="control-group form-group">
              <div class="controls">
                <label>Medium:</label>
					<select name="medium" class="form-control">
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="English">English</option>
					  <option value="Bengali">Bengali</option>'
					  ?>
					</select>
              </div>
            </div>
			</div>
			
			<div class="col-md-3">
			<div class="control-group form-group">
              <div class="controls">
                <label>Class:</label>
					<select name="class" class="form-control">
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="Class1">Class1</option>
					  <option value="Class2">Class2</option>
					  <option value="Class3">CLass3</option>
					  <option value="Class4">Class4</option>
					  <option value="Class5">Class5</option>
					  <option value="Class6">Class6</option>
					  <option value="Class7">Class7</option>
					  <option value="Class8">Class8</option>
					  <option value="SSC-Science">SSC-Science</option>
					  <option value="SSC-Business">SSC-Business</option>
					  <option value="SSC-Arts">SSC-Arts</option>
					  <option value="HSC-Science">HSC-Science</option>
					  <option value="HSC-Business">HSC-Business</option>
					  <option value="Standard1">Standard1</option>
					  <option value="Standard2">Standard2</option>
					  <option value="Standard3">Standard3</option>
					  <option value="Standard4">Standard4</option>
					  <option value="Standard5">Standard5</option>
					  <option value="Standard6">Standard6</option>
					  <option value="Standard7">Standard7</option>
					  <option value="Standard8">Standard8</option>
					  <option value="O-level">O-level</option>
					  <option value="A-level">A-level</option>'
					  ?>
					</select>
              </div>
            </div>
			</div>
			
			<div class="col-md-3">
			<div class="control-group form-group">
              <div class="controls">
                <label>Subject:</label>
					<select name="subject" class="form-control">
					  <?php
					  echo
					  '<option value="None" selected="selected"></option>
					  <option value="All">All</option>
					  <option value="Math">Math</option>
					  <option value="English">English</option>
					  <option value="Physics" >Physics</option>
					  <option value="Chemistry">Chemistry</option>
					  <option value="Biology">Biology</option>
					  <option value="Accounting">Accounting</option>
					  <option value="ICT">ICT</option>'
					  ?>
					</select>
              </div>
			<br><button type="submit" class="btn btn-primary" name="filterSearch">Search by Filtering</button><br><br>
        </div>
		</div>
		</div>
		</form>
      <!-- Marketing Icons Section -->
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
	  <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
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
