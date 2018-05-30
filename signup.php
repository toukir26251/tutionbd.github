<?php
session_start();
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
              <a class="nav-link" href="about.html">About</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>
			<li class="nav-item">
              <a class="nav-link active dropdown" href="signup.php">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign Up
        <small>Registration</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Sign Up</li>
      </ol>

      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Fill up all the fields</h3>
          <form action="regConf.php" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
			 <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" name="pass" required data-validation-required-message="Please enter your password">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Education:</label>
                <input type="text" class="form-control" name="education" required data-validation-required-message="Please enter your educational bio">
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Location:</label>
					<select name="location" class="form-control" required data-validation-required-message="Please select you location">
					  <option value="None"></option>
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
					  <option value="Uttara">Uttara</option>
					</select>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls" required data-validation-required-message="Please select one">
                <label>You are a :</label><br>
                <font color="green">Tutor &nbsp &nbsp &nbsp &nbsp &nbsp</font><input type="radio" name="tutor" value="Tutor"><br>
				<font color="green">Student  &nbsp &nbsp &nbsp</font><input type="radio" name="tutor" value="Student"><br>
              </div>
            </div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" name="submitVarification">Submit for varification</button>
          </form>
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

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
