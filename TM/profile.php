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


$sqlNew = "SELECT MssgSeen FROM Message where Tutor='".$_SESSION['Uname']."' and Sender = '1'";

$resultNew = $conn->query($sqlNew);

$sqlNewA = "SELECT MssgSeen FROM Message where Tutor='".$_SESSION['Uname']."' and Sender = '3'";

$resultNewA = $conn->query($sqlNewA);

$sqlReq = "SELECT Connection FROM `connection` where Tutor='".$_SESSION['Uname']."'";

$resultReq = $conn->query($sqlReq);



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
			  <a class="nav-link active dropdown" href="profile.php">Profile</a>
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

	<div class="row">
	  <div class="col-md-6">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?php echo $row['FullName']; ?>
      </h1>
	  </div>
	  <div class="col-md-2">
      <!-- Page Heading/Breadcrumbs -->
	  <?php while($reqNew = mysqli_fetch_array($resultReq))
			{
				if($reqNew['Connection']=='1')
				{
					echo '<ul class="w3-ul">  
					<li class="w3-xxxlarge"><i class="fa fa-users"></i></li>  
					</ul>';
					break;
				}
			}				?>
      
	  </div>
	  <div class="col-md-2">
      <!-- Page Heading/Breadcrumbs -->
	  <?php while($mssgNew = mysqli_fetch_array($resultNew))
			{
				if($mssgNew['MssgSeen']=='1')
				{
					echo '<ul class="w3-ul">  
					<li class="w3-xxlarge"><i class="fa fa-briefcase">Student</i></li>  
					</ul>';
					break;
				}
			}				?>
      
	  </div>
	  <div class="col-md-2">
      <!-- Page Heading/Breadcrumbs -->
	  <?php while($mssgNew = mysqli_fetch_array($resultNewA))
			{
				if($mssgNew['MssgSeen']=='1')
				{
					echo '<ul class="w3-ul">  
					<li class="w3-xxlarge"><i class="fa fa-briefcase">Admin</i></li>  
					</ul>';
					break;
				}
			}				?>
      
	  </div>
	  </div>
	  

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Porfile(Tutor)</li>
      </ol>
	  
	  <div class="row">
	  <div class="col-md-6">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xxxlarge"><i class="fa fa-envelope"></i> <a style="font-size:20px" href="inbox.php">Inbox</a> </li>  
		  </ul>
		</div>
		</div>
		<br>
		
		<div class="col-md-6">
		<div class="w3-container">
		  <ul class="w3-ul">  
			<li class="w3-xxxlarge"><i class="fa fa-handshake-o"></i> <a style="font-size:20px" href="inboxToAdminTu.php">Concact to Admin</a> </li> 
		  </ul>
		</div>
		</div>
		
		</div>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-6">
          <img class="img-fluid" src="<?php echo $row['Photo']; ?>">
        </div>
		
		
        <div class="col-md-6">
          <h3>Personal Info</h3>
          <form action="saveChangeTu.php" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="name" Value="<?php echo $row['FullName'] ?>" disabled>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name="phone" Value="<?php echo $row['PhoneNumber'] ?>" disabled>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" Value="<?php echo $row['Email'] ?>" disabled>
              </div>
            </div>
			
			<div class="control-group form-group">
              <div class="controls">
                <label>Gender:</label>
					<select name="gender" class="form-control" disabled>
					  <?php
					  echo '
					  <option value="'.$row["Gender"].'" selected="selected">'.$row["Gender"].'</option>
					  <option value="Male">Male</option>
					  <option value="Female">Female</option>
					  <option value="Other">Other</option>';
					  ?>
					</select>
              </div>
            </div>
			
            <div class="control-group form-group">
              <div class="controls">
                <label>Education:</label>
                <input type="text" class="form-control" name="education" Value="<?php echo $row['Education'] ?>" disabled>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Location:</label>
					<select name="location" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="'.$row["Location"].'" selected="selected">'.$row["Location"].'</option>
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
		  </form>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->

      <div class="row">

		<div class="col-md-6">
		
		<div class="card my">
		<h2 class="card-header" align="middle">Avaiablity status</h2>
		<?php
			$checkYes="";
			$checkNo="";
		
			if($row['Availability']=="yes")
				$checkYes="checked";
			if($row['Availability']=="no")
				$checkNo="checked";
		
		?>
		  <form action="profileUpdate.php" method="post">
			<div class="card-body">
				<div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <input type="radio" name="Available" value="yes"<?php echo $checkYes; ?>><font color="green">Avaiable</font>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <input type="radio" name="Available" value="no"<?php echo $checkNo; ?>><font color="red">Not Available</font>
                    </li>
                  </ul>
                </div>
              </div>
			  </div>
            </div>
			<br>
		<button type="submit" class="btn btn-primary" name="saveChange3">Save Avaiablity</button><br><br>
		</form>
		
		<font size="4pd" color="red">Number of report you have : </font>
			<?php for($i=0;$i<$row['Report'];$i++)
			
				echo '<span>&#9888;</span>';
		
			?>
			
			
		<form action="changePass.php" method="POST">
		<br><button type="submit" class="btn btn-warning" name="changePass">Change Your Password</button><br><br>
		</form>
		
		</div>
	  
        <div class="col-md-6">
          <h3>More Info</h3>
          <form method="post" action="saveChangeTu.php">
		  
		  <div class="control-group form-group">
              <div class="controls">
                <label>Medium of Interest:</label>
					<select name="medium" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="'.$row["Medium"].'" selected="selected">'.$row["Medium"].'</option>
					  <option value="English">English</option>
					  <option value="Bengali">Bengali</option>'
					  ?>
					</select>
              </div>
            </div>
		  
			<div class="control-group form-group">
              <div class="controls">
                <label>Profession:</label>
					<select name="profession" class="form-control" disabled>
					  <?php
					  echo
					  '
					  <option value="'.$row["Profession"].'" selected="selected">'.$row["Profession"].'</option>
					  <option value="Student">Student</option>
					  <option value="Teacher">Teacher</option>
					  <option value="Service">Service</option>'
					  ?>
					</select>
              </div>
            </div>
			
			<div class="control-group form-group">
              <div class="controls">
                <label>Expected Salary:</label>
					<select name="salary" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="'.$row["Salary"].'" selected="selected">'.$row["Salary"].'</option>
					  <option value="1k">1k</option>
					  <option value="2k">2k</option>
					  <option value="3k">3k</option>
					  <option value="4k">4k</option>
					  <option value="5k">5k</option>
					  <option value="More Than 5k">More than 5k</option>'
					  ?>
					</select>
              </div>
            </div>
			
			<div class="control-group form-group">
              <div class="controls">
                <label>Expected Student:</label>
					<select name="student" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="None"></option>
					  <option value="'.$row["ExpectedStudent"].'" selected="selected">'.$row["ExpectedStudent"].'</option>
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
			<div class="control-group form-group">
              <div class="controls">
                <label>Subject of Interest 1:</label>
					<select name="sub1" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="'.$row["SOI1"].'" selected="selected">'.$row["SOI1"].'</option>
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
			  <div class="control-group form-group">
              <div class="controls">
                <label>Subject of Interest 2:</label>
					<select name="sub2" class="form-control" disabled>
					  <?php
					  echo
					  '<option value="'.$row["SOI2"].'" selected="selected">'.$row["SOI2"].'</option>
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
            </div>
			<button type="submit" class="btn btn-primary" name="saveChange2">Edit</button><br><br>
		  </form>
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

<?php
}
else
	header("Location: http://localhost/TM/login.php");
?>
