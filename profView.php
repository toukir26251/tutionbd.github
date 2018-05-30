<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmdb";

$showVar="";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT PhoneNumber FROM reginfo";
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
				$sql = "SELECT * FROM reginfo Where PhoneNumber='$showVar'";
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
          <img class="img-fluid" src="'.$row["Photo"].'" height="350">
        </div>

        <div class="col-md-6">
		<h3>Personal Info</h3><br>
		<div class="row">
		<div class="col-md-6">
          Full Name :<br><br>
		  Phone Number :<br><br>
		  Email : <br><br>
		  Education :<br><br>
		  Location :<br><br>
		  Profession :<br><br>
		  Expected Salary : <br><br>
		  Expected Student :<br><br>
		  Sub of Interest :<br><br>
		  Availablity :<br><br>
		</div>
		
		<div class="col-md-6">
          '.$row['FullName'].'<br><br>
		  '.$row['PhoneNumber'].'<br><br>
		  '.$row['Email'].'<br><br>
		  '.$row['Education'].'<br><br>
		  '.$row['Location'].'<br><br>
		  '.$row['Profession'].'<br><br>
		  '.$row['Salary'].'<br><br>
		  '.$row['ExpectedStudent'].'<br><br>
		  '.$row['SOI1'].",".$row['SOI2'].'<br><br>
		  '.$row['Availability'].'<br><br>
		  
		  <div class="card-footer">
		  ';
				
				break;
				}
		  }
		  }
		  ?>
		  <?php
		  
			if(isset($_SESSION['Uname']))
			{
				$resultCon = $conn->query("Select Connection from connection where Student='".$_SESSION['Uname']."' and Tutor='".$row['Email']."'");
				$rowCon = $resultCon->fetch_assoc();
				
				
				if(isset($_SESSION['student']))
				{
					if($rowCon['Connection']==1)
					{
						echo
						  '
						  <button class="btn btn-primary">" Requested Tutor. "</button><br>
						  <br>';
						
					}
					else if($rowCon['Connection']==2)
					{
						echo
						  '
						  <form action="firstMssg.php" method="post">
						  <button type="submit" name="'.$row['PhoneNumber'].'" class="btn btn-primary">" Message This Tutor "</button><br>
						  </form>
						  <br>';
						
					}
					else
					{
						echo
						'
						  <form action="request.php" method="post">
						  <button type="submit" name="'.$row['PhoneNumber'].'" class="btn btn-primary">"Request This Tutor"</button>
						  </form>
						  <br>';
		  
					}
				}
				?>
				<?php
				
				$sqlRep = "Select Report1,Report2,Report3 from reginfo Where Email='".$row['Email']."'";
				$res = $conn->query($sqlRep);
				$resRep=$res->fetch_assoc();
				
				if($resRep['Report1']==$_SESSION['Uname'] || $resRep['Report2']==$_SESSION['Uname'] || $resRep['Report3']==$_SESSION['Uname'])
				{
					echo '<button type="button" name="" class="btn btn-primary">" Reported Tutor "</button>';
				}
				
				else
				{
				echo '
		  
		  <form action="report.php" method="post">
		  <button type="submit" name="'.$row['PhoneNumber'].'" class="btn btn-primary">" Report  This  Tutor "</button>
		  </form>
		  
		  </div>
		  </div>
		</div>
		
		</div>

		</div>
      <!-- /.row -->
	  
	  

      <!-- Related Projects Row -->

      

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
				
				';
				}
			}

?>